<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\{
    forminduccion,
    form_eci,
    form_seg,
    Cursos,
    Clientes
};

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
        'active',
        'img',
        'contrato'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'role_id' => 'integer',
        'departamento_id' => 'integer'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getImgAttribute($value)
    {
        if ($value == null || $value == '') {
            return "https://placehold.co/600x400/png";
        } else {
            return url('images/' . $this->attributes['img']);
        }
    }
    public function allPropiedades()
    {
        return $this->hasMany(Propiedades::class);
    }
    public function departamento()
    {
        return $this->belongsTo(departamentos::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function votos()
    {
        return $this->hasMany(Voto::class);
    }

    public function reservationpayments()
    {
        return $this->hasMany(Reservationpayment::class);
    }
}
