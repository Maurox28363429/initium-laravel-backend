<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_seg extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "curso_id",
        "interpersonalObjectives1",
        "interpersonalObjectives2",
        "professionalObjectives1",
        "professionalObjectives2",
        "objectiveInTheCommunity1",
        "objectiveInTheCommunity2",
        "recursante"
    ];
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
