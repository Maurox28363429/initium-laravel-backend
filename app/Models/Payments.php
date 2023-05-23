<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        'client_id',
        'total',
        'file',
        'method'
    ];
    public function client()
    {
        return $this->belongsTo(Clientes::class, 'client_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
