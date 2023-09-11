<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\golobjetivos;
use App\Observers\GolObjetivosObserver;
use Illuminate\Database\Eloquent\Concerns\HasEvents;
class golobjetivos extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
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
    protected $appends = ['aprovedAll'];
    protected $casts = [
        'approvedOne' => 'boolean',
        'approvedTwo' => 'boolean',
        'approvedThree' => 'boolean',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
    public function getAprovedAllAttribute()
    {
        if ($this->approvedOne == 1 && $this->approvedTwo == 1 && $this->approvedThree == 1) {
            // golobjetivos::where('id',$this->id)->update([
            //     "approved"=>true
            // ]);
            return true;
        } else {
            return false;
        }
    }
    protected static function boot()
    {
        parent::boot();
        self::observe(GolObjetivosObserver::class);
    }
}
