<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursovotos extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "votacion_id",
        "seleccion_1",
        "seleccion_2",
        "seleccion_3"   
    ];
    public function votacion()
    {
        return $this->belongsTo(cursovotaciones::class, 'votacion_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
