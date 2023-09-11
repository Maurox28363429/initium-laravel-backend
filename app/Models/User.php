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
    User,
    golobjetivos
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
        'img',
        "reglas",
        'curso_id'
    ];
    protected $hidden = [
        'password',
        'remember_token',
        'recovery_cod'
    ];
    protected $appends = [
        'form_gol',
        'form_eci',
        'form_seg',
        'curso_type',
        "curso",
        "golobjetivos"
    ];
    public function getFormResolveAttribute()
    {

        $form=Clientes::where('user_id',$this->attributes['id'])->where('Nickname','!=','')->count();
        if($form!=0){
            return true;
        }else{
            return false;
        }
    }
    public function getCursoActualIdAttribute()
    {
        return Clientes::where('user_id',$this->attributes['id'])->first()->curso_id ?? null;
    }
    public function getFormGolAttribute()
    {
        $form=forminduccion::where('user_id',$this->attributes['id'])->count();
        if($form!=0){
            return true;
        }else{
            return false;
        }
    }
    public function getFormEciAttribute()
    {
        $form=form_eci::where('user_id',$this->attributes['id'])->count();
        if($form!=0){
            return true;
        }else{
            return false;
        }
    }
    public function getFormSegAttribute()
    {
        $form=form_seg::where('user_id',$this->attributes['id'])->count();
        if($form!=0){
            return true;
        }else{
            return false;
        }
    }
    public function getCursoTypeAttribute()
    {
        
        $curso_id=Clientes::where('user_id',$this->attributes['id'])->first()->curso_id ?? null;
        if(!$curso_id){
            return null;
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
        return null;
    }
    public function getCursoAttribute()
    {
        
        $curso_id=Clientes::where('user_id',$this->attributes['id'])->first()->curso_id ?? null;
        if(!$curso_id){
            return null;
        }
        $curso=Cursos::where('id',$curso_id)->limit(1)->select([
            'id',
            'name',
            "gol_active"
        ])->first();
        return $curso;
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'active' => 'integer'
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
            return $this->attributes['img'];
        }
    }
    public function getGolobjetivosAttribute(){
        $gol=golobjetivos::where('user_id',$this->attributes['id'])->first();
        if($gol){
            return $gol;
        }else{
            return null;
        }
    }
}
