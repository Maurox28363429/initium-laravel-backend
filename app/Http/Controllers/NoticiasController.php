<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Noticias as Models,
    User,
    Edificios
};
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class NoticiasController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('includes') ?? [];
        $query->with($with);
        $page = $request->input('page') ?? null;
        $default = $request->input('default') ?? null;
        $default_init_date = null;
        $edificio_id = $request->input('edificio_id') ?? null;
        $search = $request->input('search') ?? null;
        if($search){
            $query->where('name','like','%'.$search.'%');
        }
        if($default){
            $default_init_date = Carbon::now()->format('Y-m-d');
            $user = JWTAuth::parseToken()->authenticate();
            $edificio_id = $user->edificio_id;
        }
        if($edificio_id){
            $query->where('edificios_id', $edificio_id);
        }
        $init_date = $request->input('init_date') ?? $default_init_date;
        $end_date = $request->input('end_date') ?? null;
        if($init_date){
            $query->where('init_date', '>=', $init_date);
        }
        if($end_date){
            $query->where('end_date', '<=', $end_date);
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
        if ($request->hasFile('img')) {
            $date = Carbon::now();
            $text = $date->format('Y_m_d');
            $image = $request->file('img');
            $path = $image->store('public/noticias/' . $text . "/");
            $data['img'] = env('APP_URL') . Storage::url($path);
        }
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id, Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $date = Carbon::now();
            $text = $date->format('Y_m_d');
            $image = $request->file('img');
            $path = $image->store('public/noticias/' . $text . "/");
            $data['img'] = env('APP_URL') . Storage::url($path);
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
