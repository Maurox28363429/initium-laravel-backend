<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    cursovotos as Models,
    User,
    cursovotaciones
};
use App\Http\Traits\HelpersTrait;
use Illuminate\Support\Facades\DB;

class CursovotosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $with = $request->input('with') ?? [];
        $query = Models::query()->with($with);
        $votacion_id = $request->input('votacion_id') ?? null;
        $curso_id = $request->input('curso_id') ?? null;
        $user_id = $request->input('user_id') ?? null;
        if ($votacion_id) {
            $query->where('votacion_id', $votacion_id);
        }
        if ($curso_id) {
            $query->whereHas('votacion', function ($q) use ($curso_id) {
                $q->where('curso_id', $curso_id);
            });
        }
        if ($user_id) {
            $query->where('user_id', $user_id);
            $user = $query->first();
            if ($user) {
                return $user;
            } else {
                return response()->json([
                    'message' => 'No se encontro el voto'
                ], 200);
            }
        }
        return $this->HelpPaginate(
            $query
        );
    }
    public function report(Request $request)
    {
        $query = Models::query();
        $votacion_id = $request->input('votacion_id') ?? null;
        if (!$votacion_id) {
            return response()->json([
                'message' => 'No se envio la votacion'
            ], 404);
        }
        $query->where('votacion_id', $votacion_id);
        $resultados = [];
        $votos = $query->get();
        foreach ($votos as $key => $voto) {
            $resultados[$voto->seleccion_1] = $resultados[$voto->seleccion_1] ?? 0;
            $resultados[$voto->seleccion_1] += 1;
            $resultados[$voto->seleccion_2] = $resultados[$voto->seleccion_2] ?? 0;
            $resultados[$voto->seleccion_2] += 1;
            $resultados[$voto->seleccion_3] = $resultados[$voto->seleccion_3] ?? 0;
            $resultados[$voto->seleccion_3] += 1;
        }
        foreach ($resultados as $key => $value) {
            $resultados[$key] = [
                'user' => User::where('id', $key)->select([
                    "id",
                    "name",
                    "email",
                    "img"
                ])->first(),
                'votos' => $value
            ];
        }
        return $resultados;
    }
    public function reportAll(Request $request)
    {

        $curso_id = $request->input('curso_id') ?? null;
        if (!$curso_id) {
            return response()->json([
                'message' => 'No se envio el curso'
            ], 404);
        }
        $votaciones = cursovotaciones::where('curso_id', $curso_id)->get();
        $usuarios = [];
        $votos_por_votacion = [];
        /*  Votos
            "user_id",
            "votacion_id",
            "seleccion_1",
            "seleccion_2",
            "seleccion_3"
        */
        /*
            votacion
            "nombre",
            "descripcion",
            "curso_id",
            "imagen",
            "status"
        */
        foreach($votaciones as $key => $value){
            $votos = Models::where('votacion_id', $value->id)->get();
            $votos_por_votacion[$value->id] = [];
            foreach($votos as $key2 => $value2){
                $votos_por_votacion[$value->id][$value2->user_id] = $value2;
                $usuarios[$value2->user_id] = $value2->user_id;
            }
        }
        $usuarios = User::whereIn('id', $usuarios)->get();
        $resultados = [];
        foreach($usuarios as $key => $value){
            $resultados[$value->id] = [
                'user' => $value,
                'votaciones' => []
            ];
            foreach($votaciones as $key2 => $value2){
                $resultados[$value->id]['votaciones'][$value2->id] = [
                    'votacion' => $value2,
                    'voto' => $votos_por_votacion[$value2->id][$value->id] ?? null
                ];
            }
        }
        return $resultados;
        
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
        try {
            DB::beginTransaction();
            $data = $request->all();
            $votos = $request->input('resultados') ?? [];
            $votacion_id = $request->input('votacion_id') ?? null;
            $user_id = $request->input('user_id') ?? null;
            $has_votacion = Models::where('votacion_id', $votacion_id)->where('user_id', $user_id)->first();
            if ($has_votacion) {
                throw new \Exception("Ya se ha votado");
            }
            if (sizeof($votos) > 3) {
                throw new \Exception("Solo se puede votar por 3");
            }
            foreach ($votos as $key => $value) {
                if ($value == $data['user_id']) {
                    throw new \Exception("No se puede votar por si mismo");
                }
                $puesto = $key + 1;
                $data['seleccion_' . $puesto] = $value;
            }
            DB::commit();
            return $this->HelpStore(
                Models::query(),
                $data
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->myError($e);
        }
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
