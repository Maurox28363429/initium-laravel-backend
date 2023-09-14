<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Noticias extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body', 'edificios_id', 'img', "init_date", "end_date"];
    protected $cats = ['init_date' => 'date', 'end_date' => 'date', 'edificios_id' => 'integer'];
    public function edificios()
    {
        return $this->belongsTo(Edificios::class);
    }
    public function getInitDateAttribute($value)
    {
        return date('Y/m/d', strtotime($value));
    }
    public function getEndDateAttribute($value)
    {
        return date('Y/m/d', strtotime($value));
    }
}
