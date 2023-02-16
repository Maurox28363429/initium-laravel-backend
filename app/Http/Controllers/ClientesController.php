<?php

namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\{
        Clientes as Models,
        Cursos
    };
    use App\Http\Traits\HelpersTrait;
class ClientesController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
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
        }
        $query->where('soft_delete',0);
        if($assist && $curso_id){
    		$query2=Models::query()->orderBy('name','asc');
    		$query2->whereHas('orders', function($q) use ($curso_id){
                $q->where('curso_id',$curso_id);
            });
          $query2->with(['assist' => function ($query)use($curso_id){
        		$query->where('curso_id',$curso_id);
    		}]);
    		if($search){
            $query2->WhereRaw("CONCAT(`name`, ' ', `last_name`) LIKE ?", ['%'.$search.'%']);
        	}
    		$total=$query2->count();
    		$asist=$query2->has('assist', '>', 0)->count();
    		$no_asist=$total-$asist;
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
            ]
        ];
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
            $data= $request->except(['referrals_code']);
            $model=Models::query()->create($data);
            $model->referrals_code=$model->id+rand(0,2000);
            $model->save();
            return [
                "message"=>"Datos creados",
                "status"=>200,
                "data"=>$model
            ];
        } catch (\Exception $e) {
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
        return $this->HelpUpdate(
            Models::where("id",$id)->limit(1),
            ["soft_delete"=>1]
        );
        
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
