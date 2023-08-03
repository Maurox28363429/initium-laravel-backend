<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursovotaciones extends Model
{
    use HasFactory;
    protected $fillable=[
        "nombre",
        "descripcion",
        "curso_id",
        "imagen"
    ];
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
}
