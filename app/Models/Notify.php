<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;
    protected $fillable=[
        "titulo",
        "body",
        "data",
    ];
    public function setDataAttribute($value){
        $this->attributes['data'] = json_encode($value);
    }
    public function getDataAttribute($value){
        return json_decode($value);
    }
}
