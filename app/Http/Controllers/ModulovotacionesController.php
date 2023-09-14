<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modulovotaciones as Models;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
use Carbon\Carbon;

class ModulovotacionesController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('includes') ?? [];
        $query->with($with);
        $edificio_id = $request->input('edificio_id') ?? null;
        $estado = $request->input('estado') ?? null;
        if($edificio_id){
            $query->where('edificio_id', $edificio_id);
        }
        if($estado){
            $query->where('estado', $estado);
        }
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
        if($data['tipoDeEncuesta']!="cerrada" && $data['tipoDeEncuesta']!="multiple"){
            return response()->json([
                'message' => 'Error al actualizar',
                'error' => "El tipo de encuensta debe ser cerrada o multiple"
            ], 500);
        }
        if($data['status']!="Activo" && $data['status']!="Cerrado" && $data['status']!="Pausa"){
            return response()->json([
                'message' => 'Error al actualizar',
                'error' => "El status debe ser Activo, Cerrado o Pausa"
            ], 500);
        }
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id, Request $request)
    {
        $data=$request->all();
        if($data['tipoDeEncuesta']!="cerrada" && $data['tipoDeEncuesta']!="multiple"){
            return response()->json([
                'message' => 'Error al actualizar',
                'error' => "El tipo de encuensta debe ser cerrada o multiple"
            ], 500);
        }
        if($data['status']!="Activo" && $data['status']!="Cerrado" && $data['status']!="Pausa"){
            return response()->json([
                'message' => 'Error al actualizar',
                'error' => "El status debe ser Activo, Cerrado o Pausa"
            ], 500);
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
