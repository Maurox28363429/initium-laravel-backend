<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jugadasEnrrolamiento extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "name",
        "descripcion",
        "parentesco",
        "curso_id"
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
