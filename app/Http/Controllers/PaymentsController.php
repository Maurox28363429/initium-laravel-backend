<?php

namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Models\{
        Payments as Models,
        Order
    };
    use App\Http\Traits\HelpersTrait;
class PaymentsController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        $query=Models::query()->with(["client","order"]);
        return $this->HelpPaginate(
                $query
            );
    }
    public function show($id,Request $request){
        $includes=$request->input('includes') ?? ["client","order"];
        return $this->HelpShow(
            Models::where("id",$id)->limit(1)->with($includes),
            $request->all()
        );
    }
    public function store(Request $request){
        $data=$request->all();
    	   $order=Order::find($data['order_id']);
    	   if(!$order){
    	   	return [
    	   		'status'=>404,
    	   		'message'=>'Orden no existente'
    	   	];
    	   }
    	   $newPending=$order->pending - $data['total'];
	   $order->update([
	   	'pending'=>$newPending
	   ]);
	   if($newPending<=0){
	   	$order->update([
	   		'pay'=>true
	   	]);
	   }
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
