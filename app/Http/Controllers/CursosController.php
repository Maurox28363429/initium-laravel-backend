<?php

namespace App\Http\Controllers;
    use App\Models\{
        Cursos as Models
    };
    use App\Http\Traits\HelpersTrait;
    use Illuminate\Http\Request;
class CursosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query();
        $search=$request->input('search') ?? null;
        if($search){
            $query->where("name","like","%".$search."%");
        }
        $active=$request->input('active') ?? null;
        if($active){
        	$query
        	  ->whereRaw('day(init_date) > day(now())')
            ->whereRaw('MONTH(init_date) = MONTH(now())')
            ->whereRaw('YEAR(init_date) = YEAR(now())');
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
