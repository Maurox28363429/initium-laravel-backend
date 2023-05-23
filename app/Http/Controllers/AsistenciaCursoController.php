<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\{
        asistencia_curso as Models
    };
    use App\Http\Traits\HelpersTrait;
class AsistenciaCursoController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query();
        $client_id=$request->input('client_id') ?? null;
        if($client_id){
            $query->where('client_id',$client_id);
        }
        return $this->HelpPaginate(
                $query
            );
    }
    public function show($id,Request $request){
        $includes=$request->input('includes') ?? [];
        return $this->HelpShow(
            Models::where("id",$id)->limit(1)->with($includes),
            $request->all()
        );
    }
    public function store(Request $request){
        return $this->HelpStore(
            Models::query(),
            $request->all()
        );
    }
    public function update($id,Request $request){
    	  $assist=$request->input('assist') ?? 0;
    	  $curso=$request->input('curso_id') ?? null;
    	  $client=$request->input('client_id') ?? null;
    	  if($assist==0){
    	  	Models::query()->where('client_id',$client)->where('curso_id',$curso)->delete();
    	  }else{
    		$this->HelpStore(
            Models::query(),
            $request->all()
        );
  	  }	
       return response()->json([
		"message"=>"Realizado exitosamente",
	  ], 200);
    }
    public function delete($id,Request $request){
        return $this->HelpDelete(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
}
