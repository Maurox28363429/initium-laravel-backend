<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citascoordinador extends Model
{
    use HasFactory;
    protected $fillable = [
        'participante_id',
        'coordinador_id',
        'horario_id',
    ];
    public function participante()
    {
        return $this->belongsTo(User::class, 'participante_id');
    }
    public function coordinador()
    {
        return $this->belongsTo(User::class, 'coordinador_id');
    }
    public function horario(){
        return $this->belongsTo(horariocoordinador::class, 'horario_id');
    }
    
}
