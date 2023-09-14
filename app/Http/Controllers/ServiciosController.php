<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios as Models;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;

class ServiciosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('includes') ?? [];
        $query->with($with);
        $page = $request->input('page') ?? null;
        $edificio_id = $request->input('edificio_id');
        if($edificio_id){
            $query->where('edificios_id',$edificio_id);
        }
        $search = $request->input('search') ?? null;
        if($search){
            $query->where('name','like','%'.$search.'%');
        }
        if (isset($page)) {
            return $this->HelpPaginate(
                $query
            );
        } else {
            return $query->select(['id', 'name'])->get();
        }
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

        return $this->HelpStore(
            Models::query(),
            $request->all()
        );
    }
    public function update($id, Request $request)
    {
        return $this->HelpUpdate(
            Models::where("id", $id)->limit(1),
            $request->all()
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
