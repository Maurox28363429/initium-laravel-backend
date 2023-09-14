<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servicios extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['edificios_id', 'name', 'body', 'monto'];

    public function edificios()
    {
        return $this->belongsTo(Edificios::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
