<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Excel;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\HelpersTrait;
use App\Models\{
	Order	
};
class DashboardController extends Controller
{
    use HelpersTrait;
    public function index(Request $request){
        try {
        	
        	 $orders_by=DB::select( DB::raw("SELECT sum(orders.price) as total, cursos.name as name FROM orders inner join cursos on orders.curso_id=cursos.id where orders.pay=true group by orders.curso_id"));
        	 $ingresos_por_curso=[];
        	 $sumatoria=0;
        	 foreach($orders_by as $key=>$value){
        	 	$sumatoria+=$value->total;
        	 }
        	 foreach($orders_by as $key=>$value){
        	 	$orders_by[$key]->total=round($value->total/$sumatoria,2) * 100;
        	 }
 //       	 return $orders_by;
            return [
                "status"=>200,
                "ordenes_pedientes_del_mes"=>DB::table('orders')->whereRaw("month(created_at) = month(now())")->where('pay',false)->count(),
                "ordenes_aprobadas_del_mes"=>DB::table('orders')->whereRaw("month(created_at) = month(now())")->where('pay',true)->count(),
                "clientes_registrados_del_mes"=>DB::table('clientes')->whereRaw("month(created_at) = month(now())")->count(),
                "pagos_ingresados_del_mes"=>DB::table('payments')->whereRaw("month(created_at) = month(now())")->sum('total'),
                "pagos_pendientes"=>DB::table('orders')->whereRaw("month(created_at) = month(now())")->sum('pending'),
                "nuevas_ordenes"=>Order::query()->whereRaw("month(created_at) = month(now())")->orderBy('id','desc')->limit(15)->with(['client','curso'])->get(),
                "ingresos_por_curso"=>$orders_by
                
                
            ];
        } catch (\Exception $e) {
            return $this->HelpError($e);
        }
    }//index()
}
