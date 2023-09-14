<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modulovotaciones_votos extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "votacion_id",
        "voto",
        "respuestas"
    ];
    public function votacion(){
        return $this->belongsTo(modulovotaciones_votaciones::class,"votacion_id");
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
    public function getRespuestasAttribute($value){
        return json_decode($value);
    }
    public function setRespuestasAttribute($value){
        $this->attributes["respuestas"]=json_encode($value);
    }
}
