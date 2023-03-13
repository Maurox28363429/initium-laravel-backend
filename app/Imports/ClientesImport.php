<?php

namespace App\Imports;

use App\Models\Clientes;
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
        $cliente=Clientes::query()->where('email',$row[3])->first();  
        if($cliente){

        }else{
            return new Clientes([
            'name'=>$row[0],
            'last_name'=>'',
            'phone'=>$row[2] ?? 0,
            'email'=>$row[3],
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
            "reference_person"=>$row[4] ?? 0
        ]);
        }//end ELSE
    }
}
