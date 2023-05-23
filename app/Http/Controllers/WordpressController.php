<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Excel;
class WordpressController extends Controller
{
    private function query($model,$pages){
        if(isset($pages)){
            $paginador='&per_page=15&page='.$pages;
        }else{
            $paginador='';
        }
        return env("wordpress_url").$model."?consumer_key=".env('wordpress_cliente').'&consumer_secret='.env('wordpress_pass').$paginador;
    }
    public function orders(Request $request){
        $pages=$request->input('pages') ?? null;
        $status=$request->input('status') ?? null;
        $query=$this->query('orders',$pages);
        if(isset($status)){
            $query.='&status='.$status;
        }
        return Http::get(
            $query
        )->json();
    }
    public function products(Request $request){
        $pages=$request->input('pages') ?? null;
        return Http::get(
            $this->query('products',$pages)
        )->json();
    }

    private $results=array();
    private $row=array();
    private $cabecera=array();
    public function contratos(Request $request)
    {
         $crawler = \Goutte::request('GET', 'https://fabricaresultados.com/example/');
         $crawler->filter('table thead tr th')->each(function ($node) {
            $this->cabecera[]=$node->text();
         });
         $crawler->filter('table tbody tr')->each(function ($node) {

            $node->filter('td')->each(function ($node2) {
                $this->row[]=$node2->text();
            });
            $this->result[]=$this->row;
            $this->row=[];
        });
         $pdf=$request->input('pdf') ?? null;
         if(isset($pdf)){
              $pdf = \PDF::loadView(
                'contratos',["cabecera"=>$this->cabecera,"data"=>$this->result]
            );
              return $pdf->download('contratos.pdf');
         }
         $csv=$request->input('csv') ?? null;
         if(isset($csv)){
            $data="";
            foreach ($this->cabecera as $key => $value) {
                $data.=$value." ,";
            }
            $data.="\n";
            foreach ($this->result as $key => $value) {

                foreach ($value as $key2 => $value2) {
                    $data.=$value2." ,";
                }
                $data.="\n";
            }
            return response($data, 200)
                  ->header('Content-Type', 'text/csv')
                  ->header('Content-Disposition',' attachment');
         }
         $excel=$request->input('excel') ?? null;
         if(isset($excel)){

         }
         $pages=$request->input('pages') ?? null;
         return [
            "cabecera"=>$this->cabecera,
            "data"=>$this->result
        ];
    }
}
