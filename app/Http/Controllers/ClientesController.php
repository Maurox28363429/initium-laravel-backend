<?php

namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\{
        Clientes as Models,
        Cursos,
        User,
        Order,
	    dias_curso_cliente,
	    historial_curso_client,
        Payments,
        asistencia_curso
    };
    use App\Http\Traits\HelpersTrait;
    use App\Imports\{
        ClientesImport,
        GolInClientesImport
    };
    use Maatwebsite\Excel\Facades\Excel;
    use Illuminate\Support\Facades\DB;
    use JWTAuth;
    use Tymon\JWTAuth\Exceptions\JWTException;
    use App\Exports\{
        ClientesExport,
        AsistenciaExport,
        PromocionesExport
    };
   use PDF;

class ClientesController extends Controller
{
    use HelpersTrait;
    public function clientes_excel_export(Request $request){
        $paremetro=$request->all();
        return Excel::download(new ClientesExport($paremetro), 'clientes.xlsx');
    }//export
    public function asistencia_excel_export(Request $request){
        $paremetro=$request->all();
        return Excel::download(new AsistenciaExport($paremetro), 'asistencia.xlsx');
    }//export
    public function promocion_excel_export(Request $request){
        $paremetro=$request->all();
        return Excel::download(new PromocionesExport($paremetro), 'promociones.xlsx');
    }//export
    public function import_estudiantes(Request $request)
    {
        $file=$request->file('excel');
        Excel::import(new ClientesImport, $file);
        return ['message'=>'existoso'];
    }
    public function import_gol(Request $request)
    {
        $file=$request->file('excel');
        Excel::import(new GolInClientesImport, $file);
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
                        if($new_curso==$client->curso_id || $new_curso=="001"){
                           return response()->json([
                   		   "message"=>"Curso invalido",
                   		   "status"=>404
                           ], 200);
                        }
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

        $search=$request->input('search') ?? null;
        $curso_id=$request->input('curso_id') ?? null;
        $curso_status=$request->input('curso_status') ?? null;
        if($search){
            $query->WhereRaw("CONCAT(`name`, ' ', `last_name`) LIKE ?", ['%'.$search.'%']);
        }

	$order_by_fecha=$request->input('fecha') ?? null;
	if($order_by_fecha){
	 $query->orderBy('created_at','desc');
	}
        $assist=$request->input('assist') ?? null;
        if($curso_id && $assist!=1){
            $query->where('curso_id',$curso_id)->orderBy('name','asc');
        }
        if($assist && $curso_id){
	     $query->where('curso_id',$curso_id)->orWhereHas('orders', function($q) use ($curso_id){
                 $q->where('curso_id',$curso_id);
             });

            $query->with(['assist' => function ($query)use($curso_id){
       		    $query->where('curso_id',$curso_id);
    	    }]);

            $query->with(['llego' => function ($query)use($curso_id){
                $query
                ->where('curso_id',$curso_id);
                // ->whereRaw('day(created_at) = day(now())')
                // ->whereRaw('MONTH(created_at) = MONTH(now())')
                // ->whereRaw('YEAR(created_at) = YEAR(now())');
            }]);

	   $llegaron=dias_curso_cliente::query()
		->where('curso_id',$curso_id)
                ->whereRaw('day(created_at) = day(now())')
                ->whereRaw('MONTH(created_at) = MONTH(now())')
                ->whereRaw('YEAR(created_at) = YEAR(now())')->count();
        }
        $no_asist=$request->input('no_asist') ?? null;
        if($no_asist){
            //para eliminar los no asistidos
	    $assist_true=$request->input('assist_true');
	      $query->whereHas('assist',function($q){
 	    },1);
        }
        $query->where('soft_delete',0);//eliminar los borrados
        if($assist && $curso_id){
            $query->with(['orders' => function ($q2) use ($curso_id) {
                $q2->where('curso_id', $curso_id);
            }]);
            //contar asistencia
    	    $query2=Models::query();
    	    $query2->where('curso_id',$curso_id)->orderBy('name','asc');
            $query2->with(['assist' => function ($q2)use($curso_id){
              $q2->where('curso_id',$curso_id);
    	    }]);


    	    $total=$query2->count();
	        $query4=Models::query();
            $query4->where('curso_id',$curso_id)->orderBy('name','asc');
            $query4->with(['assist' => function ($q2)use($curso_id){
              $q2->where('curso_id',$curso_id);
            }]);
            $query4->whereHas('assist',function($q)use($curso_id){
		        $q->where('curso_id',$curso_id);
	         });
            $asist=$query4->count();
    	    $no_asist=$total-$asist;

            //contar llego
            $query3=Models::query()->orderBy('name','asc');
    	    $query3->where('curso_id',$curso_id)->orderBy('name','asc');


    	    //ordenar
    	    $query->orderBy('name','asc');
        }
        $search_gol = $request->input('gol') ?? null;
        $datos=$query->paginate(150);

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
            	"total"=>$total ?? null,
		"llegaron"=>($assist && $curso_id)? $llegaron:null,
		"no_llegaron"=>($assist && $curso_id)? $total-$llegaron:null,
            ],
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
    public function register(Request $request){
        try {
            DB::beginTransaction();
                $data= $request->all() ?? [];
                $data["password"]=bcrypt($data["password"] ?? "12345");
                $client_search=Models::where('user_id',$data['user_id'])->first();
                $user=User::find($data['user_id']);
            
                if($client_search){
                    $data_client=$request->except([
                        'parentesco'
                    ]);
                    $datos_model=Models::where('user_id',$data['user_id'])->update($data_client);
                }else{
                    $datos_model=Models::create($data);
                }
                
            DB::commit();
            return response()->json([
                "message"=>"Registrado correctamente",
                "data"=>$datos_model,
                "user"=>$user
            ],200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                "message"=>"Error al registrar",
                "error"=>$e->getMessage()
            ],500);
        }
    }//end register
    public function store(Request $request){
        try {
            DB::beginTransaction();
            //data general
            $data= $request->except(['referrals_code']);
            //obtener el ultimo curso SIC
           //  $sic='SIC';
           //  $last_curso=Cursos::query()
           //     ->orderBy('id','desc')
           //     ->where('name',"LIKE","%".$sic."%")
           //     ->first();
	       // $data['curso_id']=$last_curso->id;
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
               // "curso_actual_id"=>$last_curso->id,
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
        // //enviar correo si es valido 0406f231-9899-47d3-a951-f20006e66c25
        // try {
        //     $enviado=$this->sendMail($data['email'],31336310,[
        //         "user_name"=>$request->input("name")." ".$request->input("last_name")
        //     ]);
        //     if($enviado->message!="OK"){
        //         throw new \Exception("Error", 404);
        //     }
        // } catch (\Exception $e) {

        //     return response()->json([
        //        "message"=>"Por favor, colocar un correo real",
        //        "error"=>"Por favor, colocar un correo real"
        //     ],200);
        // }
        // $this->sendMail("registro@grupoinitium.com",31336361,[
        //     "data_email"=>$data["email"],
        //     "data_name"=>$data["name"],
        //     "data_last_name"=>$data["last_name"],
        //     "data_nickname"=>$data["Nickname"],
        //     "accept_contract"=>"Acepto",
        //     "data_phone"=>$data["phone"]
        // ]);
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
        $client=Models::find($id);
        if(!$client){
            throw new \Exception("No encontrado", 404);
        }
        dias_curso_cliente::where('client_id',$client->id)->delete();
        Payments::where("client_id",$client->id)->delete();
        historial_curso_client::where("client_id",$client->id)->delete();
        asistencia_curso::where("client_id",$client->id)->delete();
        Order::where("client_id",$client->id)->delete();
        $client->delete();
        return $client;
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
             $query->where('curso_id',$curso_id)->orWhereHas('orders', function($q) use ($curso_id){
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
    	   $asist=$query->has('assist', '>', 0)->count();

	    $query2=Models::query();
            $query2->where('curso_id',$curso_id)->orderBy('name','asc');
            $query2->with(['assist' => function ($q2)use($curso_id){
              $q2->where('curso_id',$curso_id);
            }]);
            $total=$query2->count();

            $query4=Models::query();
            $query4->where('curso_id',$curso_id)->orderBy('name','asc');
            $query4->with(['assist' => function ($q2)use($curso_id){
              $q2->where('curso_id',$curso_id);
            }]);
            $query4->whereHas('assist',function($q)use($curso_id){
		$q->where('curso_id',$curso_id);
	    });
            $asist=$query4->count();
            $no_asist=$total-$asist;
    	   //return $query->get();
        $pdf = PDF::loadView('curso_listado',[
        	"data"=>$datos,
        	"curso"=>Cursos::find($curso_id),
        	"total"=>$total,
        	"asist"=>$asist,
        	"no_asist"=>$no_asist
        ]);
        return $pdf->download('ejemplo.pdf');
    }
    public function show_by_user($id){
        $user=User::find($id);
        if(!$user){
            throw new \Exception("No encontrado", 404);
        }
        $client=Models::where('user_id',$user->id)->first();
        if(!$client){
            throw new \Exception("No encontrado", 404);
        }
        return response()->json([
            'data'=>$client
        ],200);
    }
}
