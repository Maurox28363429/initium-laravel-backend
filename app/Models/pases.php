<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pases extends Model
{
    use HasFactory;
    protected $fillable=[
        'client_id',
        'curso_id',
        'pase'
    ];
    public function client()
    {
        return $this->belongsTo(Clientes::class, 'client_id')->select(['name','id','last_name','email','curso_id']);
    }
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
}
