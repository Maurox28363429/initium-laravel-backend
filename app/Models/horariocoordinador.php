<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\citascoordinador;
use Carbon\Carbon; 
class horariocoordinador extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'hora',
        'coordinador_id',
        'duracion_cita'
    ];
    protected $appends = ['status','participante','hora_fin'];
    public function coordinador()
    {
        return $this->belongsTo(User::class, 'coordinador_id');
    }
    public function getStatusAttribute()
    {
        $cita = citascoordinador::where('horario_id', $this->id)->first();
        if ($cita) {
            return 'ocupado';
        } else {
            return 'disponible';
        }
    }
    public function getParticipanteAttribute()
    {
        $cita = citascoordinador::where('horario_id', $this->id)->first();
        if ($cita) {
            return $cita->participante;
        } else {
            return null;
        }
    }
    public function citas()
    {
        return $this->belongsTo(citascoordinador::class, 'id','horario_id');
    }
    public function getHoraFinAttribute()
    {
        //example 02:10:00
        $hora = Carbon::parse($this->hora);
        $duracion = explode(':', $this->duracion_cita);
        $horas = $duracion[0];
        $minutos = $duracion[1];
        $hora_fin = $hora->addHours($horas)->addMinutes($minutos);
        return $hora_fin->format('H:i');
    }
}
