<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class GolInUserImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $gol=$row[1] ?? 'no disponible';
        return User::query()->where('id',$row[0])->update(['gol'=>$gol]);
        
    }
}
