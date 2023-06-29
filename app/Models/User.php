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
    Clientes,
    User
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
        'last_name',
        'role_id',
        'password',
        'active',
        "curso_actual_id",
        'form_resolve',
        'gol',
        'img'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'recovery_cod'
    ];
    protected $appends = [
        'form_gol',
        'form_eci',
        'form_seg',
        'curso_type'
    ];
    public function getFormResolveAttribute()
    {

        return Clientes::where('user_id',$this->attributes['id'])->count();
    }
    public function getCursoActualIdAttribute()
    {
        return Clientes::where('user_id',$this->attributes['id'])->first()->curso_id ?? null;
    }
    public function getFormGolAttribute()
    {
        return forminduccion::where('user_id',$this->attributes['id'])->count();
    }
    public function getFormEciAttribute()
    {
        return form_eci::where('user_id',$this->attributes['id'])->count();
    }
    public function getFormSegAttribute()
    {
        return form_seg::where('user_id',$this->attributes['id'])->count();
    }
    public function getCursoTypeAttribute()
    {
        $curso_id=Clientes::where('user_id',$this->attributes['id'])->first()->curso_id ?? null;
        if(!$curso_id){
            return 'No definido';
        }
        $curso=Cursos::where('id',$curso_id)->limit(1)->first();
        if(!$curso){
            return 'Curso no encontrado';
        }
        $curso_name=strtolower($curso->name);
        if(str_contains($curso_name, "sic")){
            return 'SIC';
        }
        if(str_contains($curso_name, "eci")){
            return 'ECI';
        }
        if(str_contains($curso_name, "gol")){
            return 'GOL';
        }
        return "No esta en un curso definido";
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function client()
    {
        return $this->belongsTo(Clientes::class,'id');
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function getImgAttribute($value){
        if($value==null || $value==''){
            return "https://placehold.co/600x400/png";
        }else{
            return $value;
        }
    }

}
