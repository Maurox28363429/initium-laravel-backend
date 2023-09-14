<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voto extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'votaciones_id', 'status', 'note'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function votaciones()
    {
        return $this->belongsTo(Votaciones::class);
    }
}
