<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservationpayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'formaspago_id',
        'reservation_id',
        'monto',
        'foto',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function formaspago()
    {
        return $this->belongsTo(Formaspago::class);
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
