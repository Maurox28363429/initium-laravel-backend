<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Clientes;
class Cursos extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'url_image',
        'description',
        'init_date',
        'end_date',
        'status'
    ];
    
    protected $appends = ['students'];
    public function getStudentsAttribute(){
	  $query=Clientes::query();
	  $curso_id=$this->attributes['id'];
	  $query->where('curso_id',$curso_id)->orderBy('name','asc');
      return $query->count();
    }
}
