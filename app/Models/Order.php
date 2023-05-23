<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        "reason",
        "client_id",
        "price",
        "pay",
        "payment_method",
        "curso_id",
        "pending",
	    "img_url",
        "gol",
        'user_id'
    ];
    public function client()
    {
        return $this->belongsTo(Clientes::class, 'client_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
    public function payment(){
    	   return $this->belongsTo(Payments::class,'id','order_id');
    }
    public function payments(){
    	   return $this->hasMany(Payments::class);
    }
    public function getCreatedAtAttribute(){
        $date=explode(" ", $this->attributes['created_at']);
        $fecha=$date[0];
        $time=$date[1];
        $fecha=explode("-",$fecha);
        return $fecha=$fecha["2"]."/".$fecha["1"]."/".$fecha["0"];
    }

}
