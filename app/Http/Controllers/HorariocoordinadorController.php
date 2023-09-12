<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\horariocoordinador as Models;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
class HorariocoordinadorController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query();
        $page=$request->input('page') ?? null;
        $tipo=$request->input('tipo') ?? null;
        $coordinador_id = $request->input('coordinador_id') ?? null;
        if($tipo){
            $query->where('tipo',$tipo);
        }
        if($coordinador_id){
            $query->where('coordinador_id',$coordinador_id);
        } 
        return $this->HelpPaginate(
            $query
        );
    }//index
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
        return $this->HelpUpdate(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
    public function delete($id,Request $request){
        return $this->HelpDelete(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
}
