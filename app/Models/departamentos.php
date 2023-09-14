<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class departamentos extends Model
{
    use HasFactory;
    protected $fillable = [
        "edificio_id",
        "nombre",
        "status",
        "propietario_principal_id",
        "propietario_secundario_id",
        "inquilino_id"
    ];
    public function edificio(){
        return $this->belongsTo(Edificios::class);
    }
}
