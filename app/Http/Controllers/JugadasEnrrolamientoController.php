<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
use App\Models\{
    jugadasEnrrolamiento as Models,
    Clientes,
    User
};
class JugadasEnrrolamientoController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query();
        $page=$request->input('page') ?? null;
        $user_id=$request->input('user_id') ?? null;
        if($user_id){
            $query->where('user_id',$user_id);
        }
        $curso_id=$request->input('curso_id') ?? null;
        if($curso_id){
             $query->where('curso_id',$curso_id);
        }
        if(isset($page)){
            return $this->HelpPaginate(
                $query
            );
        }else{
            return $query->select(['id','name'])->get();
        }
    }//index
    public function show($id,Request $request){
        $includes=$request->input('includes') ?? [];
        return $this->HelpShow(
            Models::where("id",$id)->limit(1)->with($includes),
            $request->all()
        );
    }
    public function store(Request $request){
        $data=$request->all();
        if(isset($data['user_id'])){
            $cliente=Clientes::where('user_id',$data['user_id'])->first();
            if($cliente){
                $data['curso_id']=$cliente->curso_id;
            }
        }
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id,Request $request){
        $data=$request->all();
        if (isset($data['user_id'])) {
            $cliente = Clientes::where('user_id', $data['user_id'])->first();
            if ($cliente) {
                $data['curso_id'] = $cliente->curso_id;
            }
        }
        return $this->HelpUpdate(
            Models::where("id",$id)->limit(1),
            $data
        );
    }
    public function delete($id,Request $request){
        return $this->HelpDelete(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
}
