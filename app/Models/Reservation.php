<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['servicios_id', 'inicio', 'fin', 'user_id', 'monto'];

    protected $casts = [
        'inicio' => 'datetime',
        'fin' => 'datetime',
    ];

    public function reservation()
    {
        return $this->belongsTo(Servicios::class, 'servicios_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservationpayments()
    {
        return $this->hasMany(Reservationpayment::class);
    }
}
