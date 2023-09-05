<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    golobjetivos as Models,
    User
};
use App\Http\Traits\HelpersTrait;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class GolobjetivosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query()->with(['user']);
        $user_id = $request->input('user_id') ?? null;
        $aprobado = $request->input('aprobado') ?? null;
        $no_aprobado = $request->input('no_aprobado') ?? null;
        /*
            approvedOne
            approvedTwo
            approvedThree
        */
        if($aprobado){
            $query->orderBy('approved', 'desc');
        }
        if($no_aprobado){
            $query->orderBy('approved', 'asc');
        }
        if ($user_id) {
            return $query->where('user_id', $user_id)->first();
        }
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
    public function golobjetivos_by_user($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            return response()->json(['error' => 'Usuario no encontrado'], 200);
        }
        $golobjetivos = Models::where('user_id', $id)->first();
        if (!$golobjetivos) {
            return response()->json(['error' => 'Objetivos no encontrados'], 200);
        }
        return response()->json(['data' => $golobjetivos], 200);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        // $user = JWTAuth::parseToken()->authenticate();
        
        // if (!$user) {
        //     return response()->json(['error' => 'Token invalido'], 401);
        // }
        // if ($user->role_id == 7 && isset($data['comment'])) {
        //     return response()->json(['error' => 'No tienes permisos para comentar'], 401);
        // }
        /*
            approvedOne
            approvedTwo
            approvedThree
        */
        if($data['approvedOne'] && $data['approvedTwo'] && $data['approvedThree']){
            $data['approved']=true;
        }
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id, Request $request)
    {
        $data = $request->all();
        // $user = JWTAuth::parseToken()->authenticate();
        // if (!$user) {
        //     return response()->json(['error' => 'Token invalido'], 401);
        // }
        // if ($user->role_id == 7 && isset($data['comment'])) {
        //     return response()->json(['error' => 'No tienes permisos para comentar'], 401);
        // }
        if (isset($data['approvedOne']) && isset($data['approvedTwo']) && isset($data['approvedThree'])) {
            $data['approved'] = true;
        }
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
