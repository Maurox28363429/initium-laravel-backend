<?php

namespace App\Imports;

use App\Models\Clientes;
use Maatwebsite\Excel\Concerns\ToModel;

class GolInClientesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       
        $gol=$row[1] ?? 'no disponible';
        Clientes::query()->where('id',$row[0])->update(['gol'=>$gol]);
        return Clientes::first();
    }
}
