<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formaspago extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'client_key',
        'secret_key',
        'automatica',
        'descripcion',
        'edificios_id',
        'acta'
    ];

    protected $casts = [
        'automatica' => 'boolean',
    ];

    public function edificios()
    {
        return $this->belongsTo(Edificios::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function reservationpayments()
    {
        return $this->hasMany(Reservationpayment::class);
    }
}
