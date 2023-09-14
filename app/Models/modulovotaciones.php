<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\modulovotaciones_votos;
class modulovotaciones extends Model
{
    use HasFactory;
    protected $fillable=[
        "edificio_id",
        "titulo",
        "body",
        "tipoDeEncuesta",
        "votantes_ids",
        "preguntas",
        "estado"
    ];
    protected $appends = ['personasQueVotan','resultados'];
    public function getPersonasQueVotanAttribute()
    {
        $votantes=$this->attributes['votantes_ids'];
        $votantes=count($votantes);
        return $votantes;
    }
    public function setVotantesIdsAttribute($value)
    {
        $this->attributes['votantes_ids'] = json_encode($value);
    }
    public function getVotantesIdsAttribute($value)
    {
        return $this->attributes['votantes_ids'] = json_decode($value);
    }
    public function setPreguntasAttribute($value)
    {
        $this->attributes['preguntas'] = json_encode($value);
    }
    public function getPreguntasAttribute($value)
    {
        if($value==null){
            return [];
        }
        if($value==""){
            return [];
        }
        return $this->attributes['preguntas'] = json_decode($value);
    }
    public function edificio(){
        return $this->belongsTo('App\Models\edificio');
    }
    public function getResultadosAttribute()
    {
       $votos=modulovotaciones_votos::where('votacion_id',$this->attributes['id'])->get();
       $preguntas=$this->attributes['preguntas'];
       $resultados=[];
         foreach ($preguntas as $pregunta) {
            $resultados[]=[
                "label"=>$pregunta,
                "votos"=>0,
                "respuestas_true"=>0,
                "respuestas_false"=>0,
            ];
            foreach($votos as $voto){
                $respuestas=$voto->respuestas;
                foreach($respuestas as $respuesta){
                    if($respuesta==true){
                        $resultados[count($resultados)-1]["respuestas_true"]++;
                    }
                    if($respuesta==false){
                        $resultados[count($resultados)-1]["respuestas_false"]++;
                    }
                    $resultados[count($resultados)-1]["votos"]++;
                }
            }
         }
         return $resultados;
    }


}
