<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formaspago as Models;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class FormasPagoController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('includes') ?? [];
        $query->with($with);
        $page = $request->input('page') ?? null;
        $search = $request->input('search') ?? null;
        if(isset($search)){
            $query->where('name','like','%'.$search.'%');
        }
        $edificios_id = $request->input('edificios_id') ?? null;
        if ($edificios_id) {
            $query->where('edificios_id', $edificios_id);
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
        $data = $request->all();
        if ($request->hasFile('acta')) {
            $date = Carbon::now();
            $text = $date->format('Y_m_d');
            $image = $request->file('acta');
            $path = $image->store('public/actas/' . $text . "/");
            $data['acta'] = env('APP_URL') . Storage::url($path);
        }
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id, Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('acta')) {
            $date = Carbon::now();
            $text = $date->format('Y_m_d');
            $image = $request->file('acta');
            $path = $image->store('public/actas/' . $text . "/");
            $data['acta'] = env('APP_URL') . Storage::url($path);
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