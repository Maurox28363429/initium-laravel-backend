<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Votaciones extends Model
{
    use HasFactory;

    protected $fillable = ['edificios_id', 'name', 'body'];

    public function edificios()
    {
        return $this->belongsTo(Edificios::class);
    }

    public function votos()
    {
        return $this->hasMany(Voto::class);
    }
}
