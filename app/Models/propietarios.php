<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propietarios extends Model
{
    use HasFactory;
    protected $fillable = [
        "departamento_id",
        "user_id"
    ];
    public function departamento(){
        return $this->belongsTo(departamentos::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
