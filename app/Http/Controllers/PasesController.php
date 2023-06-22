<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\HelpersTrait;
use App\Models\{
    pases as Models
};
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
class PasesController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query()->with(['client']);
        $search=$request->input('search') ?? null;
        if($search){
            $query->whereHas('client',function($query) use ($search){
                $query->WhereRaw("CONCAT(`name`, ' ', `last_name`) LIKE ?", ['%'.$search.'%']);
            });
        }
        return $this->HelpPaginate(
            $query,20
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
        $comprobacion=Models::where('curso_id',$data['curso_id'])->where('client_id',$data['client_id'])->first();
        
        Http::post('https://pocketbase.real.phoenixtechsa.com/api/collections/Initium_listado_pendientes/records', [
            'curso_id' => $data['curso_id']
        ]);
        $resetear=$request->input("resetear") ?? null;
        if($resetear){
            Models::query()->update(['numero_de_silla'=>0]);
            return 10;
        }
        if($comprobacion){
            Models::where('curso_id',$data['curso_id'])->where('client_id',$data['client_id'])->delete();
            DB::statement("
                ALTER TABLE pases DROP id;
            ");
            DB::statement("
                ALTER TABLE pases AUTO_INCREMENT = 1;
            ");
            DB::statement("
                ALTER TABLE pases ADD id int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST;
            ");
            return $comprobacion;
        }
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
