<?php

namespace App\Http\Controllers;

use App\Models\moduloVisitas as Models;
use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use App\Http\Traits\HelpersTrait;
class ModuloVisitasController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query();
        $page=$request->input('page') ?? null;
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
            Models::where("uid",$id)->limit(1)->with($includes),
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
            Models::where("uid",$id)->limit(1),
            $request->all()
        );
    }
    public function delete($id,Request $request){
        return $this->HelpDelete(
            Models::where("uid",$id)->limit(1),
            $request->all()
        );
    }
}
