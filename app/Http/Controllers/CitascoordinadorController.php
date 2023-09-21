<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citascoordinador as Models;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
class CitascoordinadorController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $includes=$request->input('includes') ?? [];
        $query=Models::query()->with($includes);
        $page=$request->input('page') ?? null;
        $participante_id = $request->input('participante_id') ?? null;
        $coordinador_id = $request->input('coordinador_id') ?? null;
        $init_date = $request->input('init_date') ?? null;
        $end_date = $request->input('end_date') ?? null;
        $estado = $request->input('estado') ?? null;
        if($participante_id){
            $query->where('participante_id',$participante_id);
        }
        if($coordinador_id){
            $query->where('coordinador_id',$coordinador_id);
        }
        if($init_date){
            $query->with(['horario']);
            $query->whereHas('horario',function($q) use ($init_date){
                $q->where('fecha','>=',$init_date);
            });
        }
        if($end_date){
            $query->with(['horario']);
            $query->whereHas('horario',function($q) use ($end_date){
                $q->where('fecha','<=',$end_date);
            });
        }
        if($estado){
            $query->where('estado',$estado);
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
