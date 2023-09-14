<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Edificios extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'dir','user_id',"cuota_method","cuota_price","departamento_price","img"];
    protected $appends = ['price_cuota'];

    public function getPriceCuotaAttribute()
    {
        $type_method = $this->cuota_method;
        if($type_method == "fija"){
            return $this->departamento_price;
        }
        if($type_method == "proporcional"){
            return $this->cuota_price;
        }
        return 0;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function formaspagos()
    {
        return $this->hasMany(Formaspago::class);
    }

    public function allNoticias()
    {
        return $this->hasMany(Noticias::class);
    }

    public function allPropiedades()
    {
        return $this->hasMany(Propiedades::class);
    }

    public function allServicios()
    {
        return $this->hasMany(Servicios::class);
    }

    public function allVotaciones()
    {
        return $this->hasMany(Votaciones::class);
    }
    public function getImgAttribute($value)
    {
        if ($value == null || $value == '') {
            return "https://placehold.co/600x400/png";
        } else {
            return url('images/' . $this->attributes['img']);
        }
    }
}
