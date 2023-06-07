<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    forminduccion as Models
};
use App\Http\Traits\HelpersTrait;
use Exception;
use Illuminate\Support\Facades\DB;
class ForminduccionController extends Controller
{
    use HelpersTrait;
    public function index(Request $request)
    {
        $query = Models::query()->with([]);
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
        try {
            DB::beginTransaction();
                $user_id=$request->input('user_id') ?? null;
                if(!$user_id){
                    throw new \Exception("No se envio el ID del usuario", 404);
                }
                $search_form=Models::query()->where('user_id',$user_id)->first();
                $data = $request->all();
                if(!$search_form){
                    $response=$this->HelpStore(
                        Models::query(),
                        $data
                    );
                }else{
                    $response=$this->HelpUpdate(
                        Models::where("id", $search_form->id)->limit(1),
                        $data
                    );
                }
            DB::commit();
            return $response;
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->HelpError($e);
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
