<?php

namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\{
        Order as Models
    };
    use App\Http\Traits\HelpersTrait;
class OrderController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query()->with(["client","curso"]);
        $curso=$request->input('curso') ?? null;
        $client=$request->input('client') ?? null;
        if($curso){
            $query->whereHas('curso', function($q) use ($curso){
                $q->where('name', 'like', "%".$curso."%");
            });
        }
        if($client){
            $query->whereHas('client', function($q) use ($client){
                $q->WhereRaw("CONCAT(`name`, ' ', `last_name`) LIKE ?", ['%'.$client.'%']);
            });
        }
        return $this->HelpPaginate(
                $query
            );
    }
    public function show($id,Request $request){
        $includes=$request->input('includes') ?? ["client","curso"];
        return $this->HelpShow(
            Models::where("id",$id)->limit(1)->with($includes),
            $request->all()
        );
    }
    public function store(Request $request){
    	   $data=$request->all();
    	   $data['pending']=$data['price'];
        return $this->HelpStore(
            Models::query(),
            $data
        );
    }
    public function update($id,Request $request){
        return $this->HelpUpdate(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
    public function delete($id,Request $request){
        return $this->HelpDelete(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
}
