<?php

namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\{
        Order as Models,
        Clientes,
        User
    };
    use App\Http\Traits\HelpersTrait;
    use Illuminate\Support\Facades\Http;
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
        $curso_id = $request->input('curso_id') ?? null;
        $client_id = $request->input('client_id') ?? null;
        $client=Clientes::find($request->input('client_id') ?? null);
        if(!$client){
            return response()->json([
               "error"=>"Cliente no valido"
            ],404);
        }else{
            $client->update(['curso_id'=>$curso_id]);
            $user=User::query()->where('id',$client->user_id)->first();
            $user->update([
                "active"=>1
              ]);
            $realtime = Http::post('https://pocketbase.real.phoenixtechsa.com/api/collections/activacion_de_usuario_initium/records', [
                        'user_id' => $user->id
                    ]);
        }
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
