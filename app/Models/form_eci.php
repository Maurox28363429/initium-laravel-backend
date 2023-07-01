<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_eci extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "curso_id",
        "question_1",
        "question_2",
        "question_3",
        "question_4",
        "question_5",
        "question_6",
        "question_7",
        "question_8",
        "question_9",
        "question_10",
        "question_11",
        "question_12",
        "question_13",
        "question_14",
        "objective_1",
        "objective_2",
        "objective_3",
        "recursante"
    ];
     protected $appends = [
        'accept_contract'
    ];
    public function getAcceptContractAttribute()
    {
        return true;
    }
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
