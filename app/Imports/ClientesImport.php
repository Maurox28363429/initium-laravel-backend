<?php

namespace App\Imports;

use App\Models\{
	Clientes,
	User,
	Order
};
use Maatwebsite\Excel\Concerns\ToModel;
//use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
          $cliente=new Clientes([
            'name'=>$row[0] ?? null,
            'last_name'=>'',
            'phone'=>$row[2] ?? 0,
            'email'=>$row[3] ?? null,
            'birth_date'=>null,
            'nacionalidad'=>'',
            'civil_status'=>'',
            'pais'=>'',
            'accept_contract'=>false,
            //aditional question
            "occupation"=>'',
            "objectives"=>'',
            "dni"=>'',
            "nickname"=>$row[1] ?? 0,
            "place_work"=>'',
            "referrals_code"=>'',
            "reference_person"=>$row[4] ?? 0,
	    "curso_id"=>1
        ]);
	Order::create([
          "reason"=>'', 
          "client_id"=>$cliente->id,
          "price"=>625,
          "pay"=>0,
          "payment_method"=>"1",
          "curso_id"=>1,
        ]);
        return $cliente;
    }
}
