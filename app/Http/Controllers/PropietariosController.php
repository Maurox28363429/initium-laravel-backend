<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
use App\Models\{
    propietarios as Models,
    User,
    departamentos
};

class PropietariosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('includes') ?? [];
        $query->with($with);
        $page = $request->input('page') ?? null;
        $user_id = $request->input('user_id') ?? null;
        if($user_id){
            $query->where('user_id', $user_id);
        }
        $departamento_id = $request->input('departamento_id') ?? null;
        if($departamento_id){
            $query->where('departamento_id', $departamento_id);
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
        try{
            DB::beginTransaction();
                $departamento_ids=$request->input('departamento_ids') ?? null;
                if(!$departamento_ids){
                    throw new \Exception("No se ha enviado los departamentos");
                }
                $user_id=$request->input('user_id') ?? null;
                if(!$user_id){
                    throw new \Exception("No se ha enviado el usuario");
                }
                $user=User::where('id',$user_id)->first();
                if(!$user){
                    throw new \Exception("No se ha encontrado el usuario");
                }
                $response=[];
                foreach($departamento_ids as $departamento_id){
                    $departamento=departamentos::where('id',$departamento_id)->first();
                    if(!$departamento){
                        throw new \Exception("No se ha encontrado el departamento");
                    }
                $response[]=Models::create([
                        'user_id'=>$user_id,
                        'departamento_id'=>$departamento_id
                    ]);
                }
            DB::commit();
            return  response()->json($response, 200);
        }catch(\Exception $e){
            DB::rollback();
            return $this->HelpError($e);
        }
    }
    public function update($id, Request $request)
    {
        try{
            DB::beginTransaction();
                $departamento_id = $request->input('departamento_id') ?? null;
                if (!$departamento_id) {
                    throw new \Exception("No se ha enviado el departamento");
                }
                $user_id = $request->input('user_id') ?? null;
                if (!$user_id) {
                    throw new \Exception("No se ha enviado el usuario");
                }
                $user = User::where('id', $user_id)->first();
                if (!$user) {
                    throw new \Exception("No se ha encontrado el usuario");
                }
                $response=Models::where('id',$id)->update([
                    'user_id'=>$user_id,
                    'departamento_id'=>$departamento_id
                ]);
            DB::commit();
            return  response()->json($response, 200);
        }catch(\Exception $e){
            DB::rollback();
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
