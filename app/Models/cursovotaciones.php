<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursovotaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "descripcion",
        "curso_id",
        "imagen",
        "status"
    ];
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
    public function getStatusAttribute($value)
    {
        switch ($value) {
            case "Abierta":
                return "Abierta";
                break;
            case "Cerrada":
                return "Cerrada";
                break;
            case "Cancelado":
                return "Cancelada";
                break;
            default:
                return "Abierta";
                break;
        }
    }
}
