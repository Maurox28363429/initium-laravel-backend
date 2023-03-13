<?php

namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\{
        Clientes as Models,
        Cursos,
        User,
        Order
    };
    use App\Http\Traits\HelpersTrait;
    use App\Imports\ClientesImport;
    use Maatwebsite\Excel\Facades\Excel;
    use Illuminate\Support\Facades\DB;
    use JWTAuth;
    use Tymon\JWTAuth\Exceptions\JWTException;
class ClientesController extends Controller
{
    use HelpersTrait;
    public function import_estudiantes(Request $request)
    {
        $file=$request->file('excel');
        Excel::import(new ClientesImport, $file);
        return ['message'=>'existoso'];
    }
    public function pase_de_estudiantes(Request $request){
        try {
            DB::beginTransaction();
                $clientes=$request->input('clientes') ?? [];
                $new_curso=$request->input('curso_id') ?? null;
                if(!$new_curso){
                    throw new \Exception('Curso no enviado',404);
                }
                $con_error=0;
                $correctos=0;
                foreach ($clientes as $value) {
                    if($value["pase"]==1){
                        $client=Models::find($value["client_id"]);
                        if($client){
                            $client->update(['curso_id'=>$new_curso]);
                            $correctos++;
                        }
                    }else{
                        $con_error++;
                    }
                }
                DB::commit();
                return response()->json([
                   "status"=>200,
                   "message"=>"Importacion exitosa",
                   "no_pasaron"=>$con_error,
                   "correctos"=>$correctos
                ],200);

        } catch (\Exception $e) {
            DB::rollback();
            return $this->HelpError($e);
        }
    }//pase_de_estudiantes
    public function index(Request $request){
    	$includes=$request->input('includes') ?? [];
        $query=Models::query()->with($includes);
        // foreach ($query->get() as $value) {
        //     Models::find($value->id)->update([
        //         "curso_id"=>Order::where('client_id',$value->id)->first()->curso_id ?? null
        //     ]);
        // }
        $search=$request->input('search') ?? null;
        $curso_id=$request->input('curso_id') ?? null;
        $curso_status=$request->input('curso_status') ?? null;
        if($search){
            $query->WhereRaw("CONCAT(`name`, ' ', `last_name`) LIKE ?", ['%'.$search.'%']);
        }
        if($curso_id){
        	// $query->whereHas('orders', function($q) use ($curso_id){
            //     $q->where('curso_id',$curso_id);
            // })->orderBy('name','asc');
            $query->where('curso_id',$curso_id)->orderBy('name','asc');
        }
        if($curso_status){
        	 $query->whereHas('orders.curso', function($q) use ($curso_status){
                $q->where('status',$curso_status);
            });
        }
        $assist=$request->input('assist') ?? null;
        if($assist && $curso_id){
        	$query->with(['assist' => function ($query)use($curso_id){
        		$query->where('curso_id',$curso_id);
    		}]);
            $query->with(['llego' => function ($query)use($curso_id){
                $query
                ->where('curso_id',$curso_id)
                ->whereRaw('day(created_at) = day(now())')
                ->whereRaw('MONTH(created_at) = MONTH(now())')
                ->whereRaw('YEAR(created_at) = YEAR(now())');
            }]);
        }
        $query->where('soft_delete',0);
        if($assist && $curso_id){
            //contar asistencia
    		$query2=Models::query()->orderBy('name','asc');
    		$query2->where('curso_id',$curso_id)->orderBy('name','asc');
            $query2->with(['assist' => function ($query)use($curso_id){
        		$query->where('curso_id',$curso_id);
    		}]);

    		$total=$query2->count();
    		$asist=$query2->has('assist', '>', 0)->count();
    		$no_asist=$total-$asist;

            //contar llego
            $query3=Models::query()->orderBy('name','asc');
    		$query3->where('curso_id',$curso_id)->orderBy('name','asc');
            $llegaron_total=$query3->count();
            $llegaron=$query3->with(['llego' => function ($query)use($curso_id){
        		$query->where('curso_id',$curso_id);
    		}],1)->count();


    		//para limpiar el response
    		$query->select([
    			"id",
    			"name",
    			"last_name",
    			"email",
    			"phone",
    			"pais"
    		])->orderBy('name','asc');
        }
        $datos=$query->paginate(200);

        return [
            "data"=>$datos->items(),
            "pagination"=>[
                "totalItems"=>$datos->total(),
                "currentPage"=>$datos->currentPage(),
                "itemsPerPage"=>$datos->perPage(),
                "lastPage"=>$datos->lastPage()
            ],
            "aditional"=>[
            	"assit"=>$asist ?? null,
            	"no_assit"=>$no_asist ?? null,
            	"total"=>$total ?? null
            ],
            "llegaron"=>[
            	"total"=>$llegaron,
            	"total_alumnos"=>$llegaron_total,
            	"faltan"=>$llegaron_total-$llegaron
            ]
        ];
    }
    public function companeros(Request $request){
        $includes=$request->input('includes') ?? [];
        $query=Models::query()->with($includes);
        //para limpiar el response
            $query->select([
                "id",
                "name",
                "last_name",
                "email",
                "phone",
                "pais"
            ])->orderBy('name','asc');
        $datos=$query->paginate(15);
        return [
            "data"=>$datos->items(),
            "pagination"=>[
                "totalItems"=>$datos->total(),
                "currentPage"=>$datos->currentPage(),
                "itemsPerPage"=>$datos->perPage(),
                "lastPage"=>$datos->lastPage()
            ]
        ];
    }
    public function lider(Request $request){
        $includes=$request->input('includes') ?? [];
        $query=Models::query()->with($includes);
        //para limpiar el response
            $query->select([
                "id",
                "name",
                "last_name",
                "email",
                "phone",
                "pais"
            ])->orderBy('name','asc');

        return $query->limit(1)->first();
    }
    public function show($id,Request $request){
        $includes=$request->input('includes') ?? [];
        return $this->HelpShow(
            Models::where("id",$id)->limit(1)->with($includes),
            $request->all()
        );
    }
    public function store(Request $request){
        try {
            DB::beginTransaction();
            //data general
            $data= $request->except(['referrals_code']);
            //obtener el ultimo curso SIC
            $sic='SIC';
            $last_curso=Cursos::query()
                ->orderBy('id','desc')
                ->where('name',"LIKE","%".$sic."%")
                ->first();
             //parsear o setear password
            $data["password"]=bcrypt($data["password"] ?? "12345");
            $name=$data['name'] ?? '';
            $name.=' ';
            $name.=$data['last_name'] ?? '';
            $user_data=[
                "name"=>$name,
                "email"=>$data['email'],
                "role_id"=>7,
                "password"=>$data['password'],
                "active"=>0,
                "curso_actual_id"=>$last_curso->id,
            ];
            $user=User::create($user_data);
            if(!$user){
                throw new \Exception('no se pudo crear el usuario cambie los datos',405);
            }
            $data['user_id']=$user->id;
            //create token
            $token = JWTAuth::fromUser($user);
            $model=Models::query()->create($data);
            //aqui se crea el codigo de referido
            $model->referrals_code=$model->id.''.rand(0,2000);
            //nombre de referido
            $reference_person=$request->input('referrals_code') ?? null;
            if($reference_person){
                $model->reference_person=$reference_person;
            }
            $model->save();
            DB::commit();
            return [
                "message"=>"Datos creados",
                "status"=>200,
                "data"=>$model,
                "user"=>$user,
                "token"=>$token
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return $this->HelpError($e);
        }

    }
    public function clientes_public_form(Request $request){
        return $this->HelpStore(
            Models::query(),
            $request->all()
        );
    }
    public function update($id,Request $request){
        return $this->HelpUpdate(
            Models::where("id",$id)->limit(1),
            $request->all()
        );
    }
    public function delete($id,Request $request){
        $response=$this->HelpUpdate(
            Models::where("id",$id)->limit(1),
            ["soft_delete"=>1]
        );

        return $response;
    }
      public function export_asistencia(Request $request){
    	   $includes=$request->input('includes') ?? [];
        $query=Models::query()->with($includes);
        $search=$request->input('search') ?? null;
        $curso_id=$request->input('curso_id') ?? null;
        $curso_status=$request->input('curso_status') ?? null;
        if($search){
            $query->WhereRaw("CONCAT(`name`, ' ', `last_name`) LIKE ?", ['%'.$search.'%']);
        }
        if($curso_id){
        	 $query->whereHas('orders', function($q) use ($curso_id){
                $q->where('curso_id',$curso_id);
            });
        }else{
          $response=[
            "file"=>"ClientController exportar_asistencia",
            "message"=>"No se envio un curso",
            "error"=>"Curso no enviado",
            "line"=>92
        ];
        return response()->json($response,404);
        }
        $query->with(['assist' => function ($query)use($curso_id){
        	$query->where('curso_id',$curso_id);
    	   }]);
    	   $datos=$query->get();
    	   $total=$query->count();
    	   $asist=$query->has('assist', '>', 0)->count();
    	   $no_asist=$total-$asist;
    	   //return $query->get();
        $pdf = \PDF::loadView('curso_listado',[
        	"data"=>$datos,
        	"curso"=>Cursos::find($curso_id),
        	"total"=>$total,
        	"asist"=>$asist,
        	"no_asist"=>$no_asist
        ]);
        return $pdf->download('ejemplo.pdf');

    }
}
