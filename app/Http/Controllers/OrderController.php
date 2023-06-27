<?php

namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\{
        Order as Models,
        Clientes
    };
    use App\Http\Traits\HelpersTrait;
class OrderController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query()->with(["client","curso"]);
	//orderby Desc
	$query->orderBy('id','desc');
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
                $query,50
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
	   $client=Clientes::find($request->input('client_id') ?? null);
	   if(!$client){
		return response()->json([
		   "error"=>"Cliente no valido"
		],404);
	   }else{
		
		  $client->update(['curso_id'=>$request->input('curso_id')]);
		
	  }
            return $this->HelpStore(
                Models::query(),
                $data
            );
            //para masivo
        // $clientes=Clientes::query()->where('id','>=',$data['client_id'])->get();
        //    foreach ($clientes as $key => $value) {
        //     $data['client_id']=$value->id;
        //         $this->HelpStore(
        //             Models::query(),
        //             $data
        //         );
        //    }
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
