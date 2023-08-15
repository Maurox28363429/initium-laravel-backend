<?php

namespace App\Http\Controllers;

use App\Models\{
    Cursos as Models
};
use App\Http\Traits\HelpersTrait;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $search = $request->input('search') ?? null;
        if ($search) {
            $query->where("name", "like", "%" . $search . "%");
        }
        $active = $request->input('active') ?? null;
        if ($active) {
            $query->orderBy("id", "desc");
                // 	$query
                // ->whereRaw('YEAR(end_date) = YEAR(now())')//init year
                // ->whereRaw('YEAR(init_date) = YEAR(now())')//end uear
                //         //->whereRaw('day(end_date) >= day(now())')//dia
                // //->whereRaw('day(init_date) <= day(now())')//dia
                // ->whereRaw('MONTH(init_date) <= MONTH(now())')//mes
                //         ->whereRaw('MONTH(end_date) >= MONTH(now())');//mes
            ;
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
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('img')) {
            $data["img"] = $this->HelpUpload($request->file('img'));
        }
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id, Request $request)
    {
        $data = $request->all();
        $curso=Models::where("id", $id)->limit(1);
        if ($request->hasFile('img')) {
            $data["url_image"] = $this->HelpUpload($request->file('img'));
        }
        if($data["url_image"] == null){
            unset($data["url_image"]);
        }
        $curso->update($data);
        return [
            "message" => "Datos Actualizados",
            "status" => 200,
            "data" => $curso
        ];

    }
    public function delete($id, Request $request)
    {
        return $this->HelpDelete(
            Models::where("id", $id)->limit(1),
            $request->all()
        );
    }
}
