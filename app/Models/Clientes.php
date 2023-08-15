<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Order,pases};
class Clientes extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'last_name',
        'phone',
        'email',
        'birth_date',
        'nacionalidad',
        'civil_status',
        'pais',
        'accept_contract',
        //aditional question
        "occupation",
        "objectives",
        "dni",
        "Nickname",
        "place_work",
        "referrals_code",
        "question_1",
        "question_2",
        "note_1",
        "note_2",
        "sexo",
        "soft_delete",
        "reference_person",
        "user_id",
        "curso_id",
        "ciudad"
    ];
    protected $appends = [
        'pagado_pendiente',
        'enrrolador',
        'pase'
    ];
    public function orders(){
    	   return $this->hasMany(Order::class,'client_id')->orderBy('created_at', 'desc');
    }
    public function getAcceptContractAttribute($value)
    {
        return true;
    }
    public function getPagadoPendienteAttribute(){
    	   $pagado=0;
    	   $pendiente=0;
    	  	foreach(Order::query()->where('client_id',$this->attributes['id'])->select(['price','pending'])->get() as $key=>$value){
    	  		$pendiente+=$value->pending;
    	  		$pagado+=$value->price-$value->pending;
    	  	}
        return [
        	"pagado"=>$pagado,
    	   	"pendiente"=>$pendiente
        ];
    }
    public function getEnrroladorAttribute(){
            return Order::query()
                    ->where('client_id',$this->attributes['id'])
                    ->select(['gol'])
                    ->orderBy('id','desc')
                    ->first()->gol ?? 'No encontrado';
    }
    public function curso()
    {
        return $this->belongsTo(Cursos::class, 'curso_id');
    }
    public function assist()
    {
        return $this->belongsTo(asistencia_curso::class,'id','client_id');
    }
    public function getPaseAttribute()
    {
        $curso=isset($this->attributes['curso_id'])? $this->attributes['curso_id']:null;
        return pases::where('client_id',$this->attributes['id'])->where('curso_id',$curso)->count();  
    }
    public function llego()
    {
        return $this->belongsTo(dias_curso_cliente::class,'id','client_id');
    }
    public function historial()
    {
        return $this->belongsTo(historial_curso_client::class,'id','client_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getCreatedAtAttribute(){
        $date=explode(" ", $this->attributes['created_at']);
        $fecha=$date[0];
        $time=$date[1];
        $fecha=explode("-",$fecha);
        return $fecha=$fecha["2"]."/".$fecha["1"]."/".$fecha["0"];
    }
	
}
