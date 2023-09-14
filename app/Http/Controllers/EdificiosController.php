<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edificios as Models;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;

class EdificiosController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query();
        $with = $request->input('includes') ?? [];
        $query->with($with);
        $page = $request->input('page') ?? null;
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
        $data = $request->all();
        if ($request->hasFile('img')) {
                $file = $request->file('img');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/edificios/', $name);
                $data['img'] = $name;
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
                $file = $request->file('img');
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . '/images/edificios/', $name);
                $data['img'] = $name;
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
