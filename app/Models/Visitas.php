<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visitas extends Model
{
    use HasFactory;

    protected $fillable = ['propiedades_id', 'date', 'nota'];


    protected $casts = [
        'date' => 'date',
    ];

    public function propiedades()
    {
        return $this->belongsTo(Propiedades::class);
    }
}
