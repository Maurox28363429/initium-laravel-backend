<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial_objetivos extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        //nuevo
        "curso_id",
        "objetiveOne",
        "howToMeasureOne",
        "whyOne",
        "howToCelebrateOne",
        "percentageOne",
        "approvedOne",
        "objetiveTwo",
        "howToMeasureTwo",
        "whyTwo",
        "howToCelebrateTwo",
        "percentageTwo",
        "approvedTwo",
        "objetiveThree",
        "howToMeasureThree",
        "whyThree",
        "howToCelebrateThree",
        "percentageThree",
        "approvedThree",
        "comment",
        "comment2",
        "comment3",
        "approved"
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
}
