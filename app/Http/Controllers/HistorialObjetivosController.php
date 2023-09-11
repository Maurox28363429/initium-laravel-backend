<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    historial_objetivos as Models,
    User
};
use App\Http\Traits\HelpersTrait;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class HistorialObjetivosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query()->with([]);
        $curso_id = $request->input('curso_id') ?? null;
        if($curso_id){
            $query->where('curso_id',$curso_id);
        }
        $user_id = $request->input('user_id') ?? null;
        if($user_id){
            $query->where('user_id',$user_id);
        }
        if(!$curso_id || !$user_id){
            return response()->json([
                'message'=>'No se encontraron los parametros necesarios'
            ],400);
        }
        $data=$query->get();
        $userData=User::find($user_id);
        return [
            'user'=>[
                'id'=>$userData->id,
                'name'=>$userData->name,
                'email'=>$userData->email,
                'img'=>$userData->img,
            ],
            'objetivo_1'=>$data->map(function($item){
                return [
                    "objetiveOne"=>$item->objetiveOne,
                    "howToMeasureOne"=>$item->howToMeasureOne,
                    "whyOne"=>$item->whyOne,
                    "howToCelebrateOne"=>$item->howToCelebrateOne,
                    "percentageOne"=>$item->percentageOne,
                    "approvedOne"=>$item->approvedOne,
                ];
            }),
            'objetivo_2'=>$data->map(function($item){
                return [
                    "objetiveTwo"=>$item->objetiveTwo,
                    "howToMeasureTwo"=>$item->howToMeasureTwo,
                    "whyTwo"=>$item->whyTwo,
                    "howToCelebrateTwo"=>$item->howToCelebrateTwo,
                    "percentageTwo"=>$item->percentageTwo,
                    "approvedTwo"=>$item->approvedTwo,
                ];
            }),
            'objetivo_3'=>$data->map(function($item){
                return [
                    "objetiveThree"=>$item->objetiveThree,
                    "howToMeasureThree"=>$item->howToMeasureThree,
                    "whyThree"=>$item->whyThree,
                    "howToCelebrateThree"=>$item->howToCelebrateThree,
                    "percentageThree"=>$item->percentageThree,
                    "approvedThree"=>$item->approvedThree,
                ];
            }),
        ];
        return $this->HelpPaginate(
            $query
        );
    }
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
        
        $data = $request->all();
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id, Request $request)
    {
        $data = $request->all();
        return $this->HelpUpdate(
            Models::where("id", $id)->limit(1),
            $data
        );
    }
    public function delete($id, Request $request)
    {
        return $this->HelpDelete(
            Models::where("id", $id)->limit(1),
            $request->all()
        );
    }
}
