<?php

namespace App\Http\Traits;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Postmark\PostmarkClient;

trait HelpersTrait
{
    protected function sendMail($email, $plantilla, $data)
    {
        $client = new PostmarkClient("90f1882f-5bbd-42ff-9e0a-fda87bd17a9f");
        // Send an email:
        return $sendResult = $client->sendEmailWithTemplate(
            "registro@grupoinitium.com ",
            $email,
            $plantilla,
            $data
        );
    }
    protected function HelpError($error)
    {
        $data = [
            "file" => $error->getFile(),
            "message" => $error->getMessage(),
            "error" => $error->getMessage(),
            "line" => $error->getLine()
        ];
        \Log::error($data);
        return $data;
    } //end
    protected function myError($error)
    {
        $data = [
            "file" => $error->getFile(),
            "message" => $error->getMessage(),
            "error" => $error->getMessage(),
            "line" => $error->getLine()
        ];
        \Log::error($data);
        return \Response()->json($data, 400);
    } //end
    protected function Error($error)
    {
        $data = [
            "file" => $error->getFile(),
            "message" => $error->getMessage(),
            "error" => $error->getMessage(),
            "line" => $error->getLine()
        ];
        \Log::error($data);
        return response()->json($data, 500);
    } //end
    protected function HelpPaginate($query, $page = 10)
    {
        $datos = $query->paginate($page);
        return [
            "data" => $datos->items(),
            "pagination" => [
                "totalItems" => $datos->total(),
                "currentPage" => $datos->currentPage(),
                "itemsPerPage" => $datos->perPage(),
                "lastPage" => $datos->lastPage()
            ]
        ];
    } //end
    protected function HelpIndex($query, $data)
    {
        try {
            DB::beginTransaction();
            $pages = $data["pages"] ?? null;
            $select = $data["select"] ?? null;
            $includes = $data["includes"] ?? [];
            if ($select != null) {
                $query->select($select);
            }
            if ($includes != null) {
                $query->with($includes);
            }
            if ($pages == null) {
                $data = $query->get();
            } else {
                $data = $query->paginate($pages);
            }
            DB::commit();
            return [
                "message" => ($pages != null) ? "Paginado de datos" : "Listado de datos",
                "status" => 200,
                "data" => $data
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    } //index
    protected function HelpDelete($query)
    {
        try {
            DB::beginTransaction();
            $process = $query->first();
            if (!$process) {
                throw new \Exception("No encontrado", 404);
            }
            $process->delete();
            DB::commit();
            return [
                "message" => "Datos borrados",
                "status" => 200
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    } //DeleteEnd
    protected function HelpStore($query, $data)
    {
        try {
            DB::beginTransaction();
            $process = $query->create($data);
            DB::commit();
            return [
                "message" => "Datos creados",
                "status" => 200,
                "data" => $process
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    } //StoreEnd
    protected function HelpUpdate($query, $data)
    {
        try {
            DB::beginTransaction();
            $process = $query->first();
            if (!$process) {
                throw new \Exception("No encontrado", 404);
            }
            $process->update($data);
            DB::commit();
            return [
                "message" => "Datos Actualizados",
                "status" => 200,
                "data" => $process
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    } //StoreEnd
    protected function HelpShow($query, $data)
    {
        try {
            DB::beginTransaction();
            $includes = $data["includes"] ?? [];
            $process = $query->with($includes)->first();
            if (!$process) {
                throw new \Exception("No encontrado", 404);
            }
            return $process;
            DB::commit();
            return [
                "message" => "Busqueda",
                "status" => 200,
                "data" => $process
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    } //StoreEnd
    protected function HelpResponse($data)
    {
        return [
            "message" => "data",
            "status" => 200,
            "data" => $data
        ];
    }
    protected function HelpUpload($file)
    {
        if ($file) {
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/images/', $name);
            $data['imagen'] = $name;
        } else {
            $data['imagen'] = null;
        }
    } //end
}//end
