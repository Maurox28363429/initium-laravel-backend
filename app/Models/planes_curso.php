<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planes_curso extends Model
{
    use HasFactory
    protected $fillable=[
        "img",
        "precio",
        "nombre",
        "calificacion",
        "descripcion",
        "link"
    ];
    
    public function getCreatedAtAttribute(){
        $date=explode(" ", $this->attributes['created_at']);
        $fecha=$date[0];
        $time=$date[1];
        $fecha=explode("-",$fecha);
        return $fecha=$fecha["2"]."/".$fecha["1"]."/".$fecha["0"];
    }
    public function getLinkAttribute(){
        if($this->attributes['link'] != null){
            return $this->attributes['link'];
        }else{
            return null;
        }
    }
    public function getImgAttribute(){
        if($this->attributes['img']){
            return url('images/' . $this->attributes['img']);
        }else{
            return url('images/' . 'default.png');
        }
    }
}
