<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    dias_curso_cliente as Models
};
use App\Http\Traits\HelpersTrait;
class DiasCursoClienteController extends Controller
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
      $assist=$request->input('llego') ?? 0;
      $curso=$request->input('curso_id') ?? null;
      $client=$request->input('client_id') ?? null;
      if($assist==0){
        Models::query()
        ->where('client_id',$client)
        ->where('curso_id',$curso)
        ->whereRaw('day(created_at) = day(now())')
        ->whereRaw('MONTH(created_at) = MONTH(now())')
        ->whereRaw('YEAR(created_at) = YEAR(now())')->delete();
        
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
    public function update($id,Request $request){
          
    }
    public function delete($id,Request $request){
        return $this->HelpDelete(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
}
