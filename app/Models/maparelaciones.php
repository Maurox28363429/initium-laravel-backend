<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maparelaciones extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "descripcion",
        "name"   
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
