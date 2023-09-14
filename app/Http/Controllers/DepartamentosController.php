<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    departamentos as Models,
    Edificios
};
use App\Http\Traits\HelpersTrait;
use Illuminate\Support\Facades\DB;

class DepartamentosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('includes') ?? [];
        $query->with($with);
        $page = $request->input('page') ?? null;
        $search = $request->input('search') ?? null;
        $status = $request->input('status') ?? null;
        if ($search) {
            $query->where("nombre", "like", "%" . $search . "%");
        }
        if($status){
            $query->where('status', $status);
        }
        $edificio_id = $request->input('edificio_id') ?? null;
        if ($edificio_id) {
            $query->where('edificio_id', $edificio_id);
        }
        if (isset($page)) {
            return $this->HelpPaginate(
                $query
            );
        } else {
            return $query->select(['id', 'nombre'])->get();
        }
    } //index
    public function show($id, Request $request)
    {
        $includes = $request->input('includes') ?? [];
        return $this->HelpShow(
            Models::where("id", $id)->limit(1)->with($includes),
            $request->all()
        );
    }
    public function generateMasive(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            if (!isset($data["edificio_id"])) {
                throw new \Exception("No se ha enviado el edificio");
            }
            $edificio = Edificios::where("id", $data["edificio_id"])->first();
            if (!$edificio) {
                throw new \Exception("No se ha encontrado el edificio");
            }
            if (!isset($data["cantidad"])) {
                throw new \Exception("No se ha enviado la cantidad de departamentos");
            }
            for ($i = 0; $i < $data["cantidad"]; $i++) {
                $departamento = new Models();
                $departamento->nombre = $edificio->name . "-" . ($i + 1);
                $departamento->edificio_id = $edificio->id;
                $departamento->status ="Ocupado";
                $departamento->save();
            }
            DB::commit();
            return response()->json([
                "message" => "Departamentos generados correctamente"
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                "message" => "Error al generar los departamentos",
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            if (!isset($data["edificio_id"])) {
                throw new \Exception("No se ha enviado el edificio");
            }
            $edificio = Edificios::where("id", $data["edificio_id"])->first();
            if (!$edificio) {
                throw new \Exception("No se ha encontrado el edificio");
            }
            $data['status']="Ocupado";
            return $this->HelpStore(
                Models::query(),
                $data
            );
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Error al generar los departamentos",
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function deleteByEdificio(Request $request)
    {
        try {
            $data = $request->all();
            if (!isset($data["edificio_id"])) {
                throw new \Exception("No se ha enviado el edificio");
            }
            $edificio = Edificios::where("id", $data["edificio_id"])->first();
            if (!$edificio) {
                throw new \Exception("No se ha encontrado el edificio");
            }
            Models::where("edificio_id", $edificio->id)->delete();
            return response()->json([
                "message" => "Departamentos eliminados correctamente"
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Error al eliminar los departamentos",
                "error" => $e->getMessage()
            ], 500);
        }
    }
    public function update($id, Request $request)
    {
        $data = $request->all();
        if($data['status']==null || $data['status']=="" || $data['status']==" "){
            $data['status']="Ocupado";
        }
        if($data['status']!="Ocupado" && $data['status']!="Desocupado"){
            throw new \Exception("El estado del departamento debe ser Ocupado o Disponible");
        }
        return $this->HelpUpdate(
            Models::where("id", $id)->limit(1),
            $data
        );
    }
    public function delete($id, Request $request)
    {
        return $this->HelpDelete(
            Models::where("id", $id)->limit(1),
            $request->all()
        );
    }
}
