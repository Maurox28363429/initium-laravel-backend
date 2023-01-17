<?php

namespace App\Http\Traits;
use Exception;
use Illuminate\Http\Request;
use Kutia\Larafirebase\Facades\Larafirebase;
use Illuminate\Support\Facades\DB;
trait HelpersTrait {

    protected function HelpError($error){
        $data=[
            "file"=>$error->getFile(),
            "message"=>$error->getMessage(),
            "error"=>$error->getMessage(),
            "line"=>$error->getLine()
        ];
        \Log::error($data);
        return $data;
    }//end
    protected function HelpPaginate($query,$page=15){
        $datos=$query->paginate($page);
        return [
            "data"=>$datos->items(),
            "pagination"=>[
                "totalItems"=>$datos->total(),
                "currentPage"=>$datos->currentPage(),
                "itemsPerPage"=>$datos->perPage(),
                "lastPage"=>$datos->lastPage()
            ]
        ];
    }//end
    protected function HelpNotification($title,$body,$tokens,$data=[]){
        if (empty($tokens)) {
            return true;
        }
        if(!is_array($tokens)){
            $tokens=[$tokens];
        }
        return Larafirebase::withTitle($title)
            ->withBody($body)
            //->withImage('https://firebase.google.com/images/social.png')
            //->withIcon('https://seeklogo.com/images/F/firebase-logo-402F407EE0-seeklogo.com.png')
            ->withSound('default')
            //->withClickAction('https://www.google.com')
            ->withPriority('high')
            ->withAdditionalData($data)
            ->sendNotification($tokens);
    }
   protected function HelpIndex($query,$data){
        try {
            DB::beginTransaction();
                $pages=$data["pages"] ?? null;
                $select=$data["select"] ?? null;
                $includes=$data["includes"] ?? [];
                if($select!=null){$query->select($select);}
                if($includes!=null){$query->with($includes);}
                if($pages==null){$data=$query->get();}else{$data=$query->paginate($pages);}
            DB::commit();
            return [
                "message"=>($pages!=null)? "Paginado de datos":"Listado de datos",
                "status"=>200,
                "data"=>$data
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }//index
    protected function HelpDelete($query){
        try {
            DB::beginTransaction();
                $process=$query->first();
                if(!$process){
                    throw new \Exception("No encontrado", 404);
                }
                $process->delete();
            DB::commit();
            return [
                "message"=>"Datos borrados",
                "status"=>200
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }//DeleteEnd
    protected function HelpStore($query,$data){
        try {
            DB::beginTransaction();
                $process=$query->create($data);
            DB::commit();
            return [
                "message"=>"Datos creados",
                "status"=>200,
                "data"=>$process
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }//StoreEnd
    protected function HelpUpdate($query,$data){
        try {
            DB::beginTransaction();
               $process=$query->first();
                if(!$process){
                    throw new \Exception("No encontrado", 404);
                }
                $process->update($data);
            DB::commit();
            return [
                "message"=>"Datos actualizados",
                "status"=>200,
                "data"=>$process
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }//StoreEnd
     protected function HelpShow($query,$data){
        try {
            DB::beginTransaction();
                $includes=$data["includes"] ?? [];
                $process=$query->with($includes)->first();
                if(!$process){
                    throw new \Exception("No encontrado", 404);
                }
                return $process;
            DB::commit();
            return [
                "message"=>"Busqueda",
                "status"=>200,
                "data"=>$process
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }//StoreEnd
}//end
