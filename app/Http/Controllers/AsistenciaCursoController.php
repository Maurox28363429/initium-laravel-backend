<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\{
        asistencia_curso as Models,
        forminduccion as GOL,
        form_eci as ECI,
        form_seg as SIC,
        Clientes,
        Cursos
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
    	  	Models::query()
            ->where('client_id',$client)
            ->where('curso_id',$curso)
            ->delete();
            $cliente_first=Clientes::query()
                ->where('id',$client)
                ->limit(1)
                ->first();

            if($cliente_first){
                $curso=Cursos::where('id',$cliente_first->curso_id)->limit(1)->first();

                
                $curso_name=strtolower($curso->name);
                if(str_contains($curso_name, "sic")){
                    return 'sic';
                    SIC::query()
                    ->where('user_id',$cliente_first->user_id)
                    ->where('curso_id',$cliente_first->curso_id)->delete();
                }
                if(str_contains($curso_name, "eci")){
                    return 'eci';
                    ECI::query()
                    ->where('user_id',$cliente_first->user_id)
                    ->where('curso_id',$cliente_first->curso_id)->delete();
                }
                if(str_contains($curso_name, "gol")){

                    GOL::query()
                    ->where('user_id',$cliente_first->user_id)
                    ->where('curso_id',$cliente_first->curso_id)->delete();
                }
            }
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
