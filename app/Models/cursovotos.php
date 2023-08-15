<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursovotos extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "votacion_id",
        "seleccion_1",
        "seleccion_2",
        "seleccion_3"
    ];
    protected $appends = [
        "resultados"
    ];
    public function votacion()
    {
        return $this->belongsTo(cursovotaciones::class, 'votacion_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getResultadosAttribute()
    {
        $resultados = [];
        if($this->seleccion_1!=null)
        {
            $resultados[] = $this->seleccion_1;
        }
        if($this->seleccion_2!=null)
        {
            $resultados[] = $this->seleccion_2;
        }
        if($this->seleccion_3!=null)
        {
            $resultados[] = $this->seleccion_3;
        }
        return $resultados;
    }

}
