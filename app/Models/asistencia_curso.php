<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asistencia_curso extends Model
{
    use HasFactory;
    protected $fillable=[
    	'curso_id',
    	'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Clientes::class,'client_id');
    }
    public function getCreatedAtAttribute(){
        $date=explode(" ", $this->attributes['created_at']);
        $fecha=$date[0];
        $time=$date[1];
        $fecha=explode("-",$fecha);
        return $fecha=$fecha["2"]."/".$fecha["1"]."/".$fecha["0"];
    }
}
