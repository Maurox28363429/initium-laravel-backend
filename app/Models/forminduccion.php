<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class forminduccion extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "question_1",
        "question_2",
        "question_3",
        "question_4",
        "question_5",
        "question_6",
        "objective_1",
        "objective_2",
        "objective_3",
        "recursante",
        "curso_id"
    ];
}
