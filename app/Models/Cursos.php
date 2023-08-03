<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;

class Cursos extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'url_image',
        'description',
        'init_date',
        'end_date',
        'status',
        "img",
        "nombre_aditional",
        "num_declaracion",
        "num_cumplimiento_declaracion",
        "cancion_gol",
        "mision_gol",
        "gol_active"
    ];

    protected $appends = ['students'];
    protected $casts = [
        'init_date' => 'date',
        'end_date' => 'date',
        'gol_active' => 'boolean',
        'num_declaracion' => 'integer',
        'num_cumplimiento_declaracion' => 'integer',
    ];
    public function getStudentsAttribute()
    {
        $query = Clientes::query();
        $curso_id = $this->attributes['id'];
        $query->where('curso_id', $curso_id)->orderBy('name', 'asc');
        return $query->count();
    }
    public function getImgAttribute($value)
    {
        if ($value) {
            return env('APP_URL') . "/images/" . $value;
        }
        return null;
    }

}
