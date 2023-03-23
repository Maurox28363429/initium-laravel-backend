<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etapas extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "price",
        "init_date",
        "end_date",
    ];
}
