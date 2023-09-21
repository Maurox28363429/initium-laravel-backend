<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    horariocoordinador as Models,
    citascoordinador
};
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class HorariocoordinadorController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query();
        $page=$request->input('page') ?? null;
        $coordinador_id = $request->input('coordinador_id') ?? null;
        if($coordinador_id){
            $query->where('coordinador_id',$coordinador_id);
        } 
        //$user=JWTAuth::parseToken()->authenticate();
        $user=null;
        if(isset($user) && $user->rol_id==7){
            //filtro por fecha >= hoy
            $query->where('fecha','>=',date('Y-m-d'));
        }
        $init_date = $request->input('init_date') ?? null;
        $end_date = $request->input('end_date') ?? null;
        if($init_date){
            $query->where('fecha','>=',$init_date);
        }
        if($end_date){
            $query->where('fecha','<=',$end_date);
        }
        $coordinador_id=$request->input('coordinador_id') ?? null;
        if($coordinador_id){
            $query->where('coordinador_id',$coordinador_id);
        }
        $status = $request->input('status') ?? null;
        if($status){
            $query->with(['citas']);
            if($status=='disponible'){
                $query->whereHas('citas',function($query){
                    
                },'==',0);
            }else{
                $query->whereHas('citas',function($query) use($status){
                    
                },'>',0);
            }
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
        $data = $request->all();
        $validar=Models::where('coordinador_id',$data['coordinador_id'])->where('fecha',$data['fecha'])->where('hora',$data['hora'])->count();
        if($validar>0){
            return response()->json([
                'status'=>'error',
                'message'=>'Ya existe un horario con la misma fecha y hora'
            ],400);
        }
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id,Request $request){
        return $this->HelpUpdate(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
    public function delete($id,Request $request){
        $validar=citascoordinador::where('horario_id',$id)->count();
        if($validar>0){
            return response()->json([
                'status'=>'error',
                'message'=>'No se puede eliminar el horario, ya que tiene citas asignadas'
            ],400);
        }
        return $this->HelpDelete(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
}
