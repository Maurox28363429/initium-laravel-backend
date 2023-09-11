<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    golobjetivos as Models,
    User,
    historial_objetivos
};
use App\Http\Traits\HelpersTrait;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\DB;

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
        $data['approvedThree']=false;
        $data['approvedTwo']=false;
        $data['approvedOne']=false;
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
       
        if(
            isset($data['approvedOne']) && 
            isset($data['approvedTwo']) && 
            isset($data['approvedThree'])
        ){
            $data['approved']=true;
        }
         */
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id, Request $request)
    {
     try {
        DB::beginTransaction();
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
        $modelo=Models::where("id", $id)->limit(1);
        $data['user_id']=$modelo->first()->user_id;
        $data['curso_id']=$modelo->first()->curso_id;
        
            $process = $modelo->first();
            if (!$process) {
                throw new \Exception("No encontrado", 404);
            }
            /*
                "objetiveOne",
            "howToMeasureOne",
            "whyOne",
            "howToCelebrateOne",
            "percentageOne",
            "approvedOne",
            "objetiveTwo",
            "howToMeasureTwo",
            "whyTwo",
            "howToCelebrateTwo",
            "percentageTwo",
            "approvedTwo",
            "objetiveThree",
            "howToMeasureThree",
            "whyThree",
            "howToCelebrateThree",
            "percentageThree",
            "approvedThree",
            "comment",
            "comment2",
            "comment3",
            "approved",
            */
            if(
                $process->objetiveOne != $data['objetiveOne'] ||
                $process->howToMeasureOne != $data['howToMeasureOne'] ||
                $process->whyOne != $data['whyOne'] ||
                $process->howToCelebrateOne != $data['howToCelebrateOne'] ||
                $process->percentageOne != $data['percentageOne'] ||
                $process->approvedOne != $data['approvedOne'] ||
                $process->objetiveTwo != $data['objetiveTwo'] ||
                $process->howToMeasureTwo != $data['howToMeasureTwo'] ||
                $process->whyTwo != $data['whyTwo'] ||
                $process->howToCelebrateTwo != $data['howToCelebrateTwo'] ||
                $process->percentageTwo != $data['percentageTwo'] ||
                $process->approvedTwo != $data['approvedTwo'] ||
                $process->objetiveThree != $data['objetiveThree'] ||
                $process->howToMeasureThree != $data['howToMeasureThree'] ||
                $process->whyThree != $data['whyThree'] ||
                $process->howToCelebrateThree != $data['howToCelebrateThree'] ||
                $process->percentageThree != $data['percentageThree'] ||
                $process->approvedThree != $data['approvedThree'] 
            ){
                historial_objetivos::create($data);
            }
            $process->update($data);
            DB::commit();
            return [
                "message" => "Datos Actualizados",
                "status" => 200,
                "data" => $process
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
        }
    }
    public function delete($id, Request $request)
    {
        return $this->HelpDelete(
            Models::where("id", $id)->limit(1),
            $request->all()
        );
    }
}
