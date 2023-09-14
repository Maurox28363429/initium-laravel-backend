<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'status', 'monto', 'propiedades_id'];


    protected $casts = [
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function propiedades()
    {
        return $this->belongsTo(Propiedades::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
