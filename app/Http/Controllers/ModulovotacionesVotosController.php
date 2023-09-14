<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modulovotaciones_votos as Models;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
use Carbon\Carbon;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class ModulovotacionesVotosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('includes') ?? [];
        $query->with($with);
        $votacion_id = $request->input('votacion_id') ?? null;
        if($votacion_id){
            $query->where('votacion_id',$votacion_id);
        }
        $user = JWTAuth::parseToken()->authenticate();
        $query->where('user_id',$user->id);
        $page = $request->input('page') ?? null;
            return $this->HelpPaginate(
                $query
            );
    } //index
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
        $data=$request->all();
        $data['user_id']=JWTAuth::parseToken()->authenticate()->id;
        $validarVotacion= Models::where('votacion_id',$data['votacion_id'])->where('user_id',$data['user_id'])->first();
        if($validarVotacion){
            return response()->json([
                'status' => 'error',
                'message' => 'Ya votaste en esta votación'
            ], 400);
        }
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id, Request $request)
    {
        $data=$request->all();
        $data['user_id']=JWTAuth::parseToken()->authenticate()->id;
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
