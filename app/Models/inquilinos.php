<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inquilinos extends Model
{
    use HasFactory;
    protected $fillable=[
        "propietario_id",
        "inquilino_id"
    ];
    public function propietario(){
        return $this->belongsTo(User::class);
    }
    public function inquilino(){
        return $this->belongsTo(User::class);
    }
}
