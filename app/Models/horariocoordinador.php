<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class horariocoordinador extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'init_hora',
        'end_hora',
        'tipo',
        'coordinador_id',
    ];
    public function coordinador()
    {
        return $this->belongsTo(User::class, 'coordinador_id');
    }
}
