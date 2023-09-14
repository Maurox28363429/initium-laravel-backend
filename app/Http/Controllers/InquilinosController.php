<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
use App\Models\{
    inquilinos as Models,
    User
};
class InquilinosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('includes') ?? [];
        $query->with($with);
        $page = $request->input('page') ?? null;
        $inquilino_id = $request->input('inquilino_id') ?? null;
        $propietario_id = $request->input('propietario_id') ?? null;
        if ($inquilino_id) {
            $query->where('inquilino_id', $inquilino_id);
        }
        if ($propietario_id) {
            $query->where('propietario_id', $propietario_id);
        }
        return $this->HelpPaginate(
            $query
        );
    } //index
    public function show($id, Request $request)
    {
        $includes = $request->input('includes') ?? [];
        return $this->HelpShow(
            Models::where("id", $id)->limit(1)->with($includes),
            $request->all()
        );
    }
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $inquilino_id=$request->input('inquilino_id') ?? null;
            if(!$inquilino_id){
                throw new \Exception("No se ha enviado el inquilino_id");
            }
            $inquilino=User::where("id",$inquilino_id)->first();
            if(!$inquilino){
                throw new \Exception("No se ha encontrado el inquilino");
            }
            $propietario_ids=$request->input('propietario_ids') ?? [];
            if(count($propietario_ids)==0){
                throw new \Exception("No se ha enviado el propietario_ids");
            }
            $response=[];
            foreach ($propietario_ids as $key => $propietario_id) {
                $propietario=User::where("id",$propietario_id)->first();
                if(!$propietario){
                    throw new \Exception("No se ha encontrado el propietario");
                }
                $response[] = Models::create([
                    "inquilino_id" => $inquilino_id,
                    "propietario_id" => $propietario_id
                ]);
            }
            DB::commit();
            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
        
    }
    public function update($id, Request $request)
    {
        try{
            DB::beginTransaction();
            $inquilino_id=$request->input('inquilino_id') ?? null;
            if(!$inquilino_id){
                throw new \Exception("No se ha enviado el inquilino_id");
            }
            $inquilino=User::where("id",$inquilino_id)->first();
            if(!$inquilino){
                throw new \Exception("No se ha encontrado el inquilino");
            }
            $propietario_id=$request->input('propietario_id') ?? null;
            if($propietario_id){
                throw new \Exception("No se ha enviado el propietario_id");
            }
            $response=Models::where("id",$id)->update([
                "inquilino_id"=>$inquilino_id,
                "propietario_id"=>$propietario_id
            ]);
            DB::commit();
            return  response()->json($response, 200);
        }catch(\Exception $e){
            DB::rollBack();
            return $this->HelpError($e);
        }
    }
    public function delete($id, Request $request)
    {
        return $this->HelpDelete(
            Models::where("id", $id)->limit(1),
            $request->all()
        );
    }
}
