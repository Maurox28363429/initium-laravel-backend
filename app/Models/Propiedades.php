<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Propiedades extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['user_id', 'edificios_id', 'monto', 'fecha_cobro'];

    protected $casts = [
        'fecha_cobro' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function edificios()
    {
        return $this->belongsTo(Edificios::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function allVisitas()
    {
        return $this->hasMany(Visitas::class);
    }
}
