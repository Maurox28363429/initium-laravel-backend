<?php

namespace App\Exports;

use App\Models\Clientes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PromocionesExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $parametros;

    public function __construct($parametros)
    {
        $this->parametros = $parametros;
    }
    public function collection()
    {
        $query=Clientes::query();
        //filter by curso
        $curso_id=$this->parametros["curso_id"];
        $query->where('curso_id',$curso_id)->orWhereHas('orders', function($q) use ($curso_id){
                 $q->where('curso_id',$curso_id);
             });
        //relations with
        $query->with(['assist' => function ($query)use($curso_id){
            $query->where('curso_id',$curso_id);
        }]);
        $query->with(['llego' => function ($query)use($curso_id){
            $query
                ->where('curso_id',$curso_id)
                ->whereRaw('day(created_at) = day(now())')
                ->whereRaw('MONTH(created_at) = MONTH(now())')
                ->whereRaw('YEAR(created_at) = YEAR(now())');
        }]);
        $data=$query->get();
        $response=$data->map(function($client)use($curso_id){
            return [
                "ID"=>$client->id,
                "Nombre"=>$client->name." ".$client->last_name,
                "NameTag"=>$client->Nickname ?? "N/D",
                "Telefono"=>$client->phone,
                "Enrolador"=>$client->reference_person,
                "Asistencia del curso"=>($client->assist)? "Asistio":"No asistio",
                "Asistio del dia"=>($client->llego)? "Asistio":"No asistio",
                "Estado en el curso"=>($client->curso_id==$curso_id)? "En curso":"Promovido"

            ];
        });
        return $response;
    }
    public function title(): string
    {
        return 'Clientes';
    }
    public function headings():array
    {
        return [
            "ID",
            "Nombre",
            "NameTag",
            "Telefono",
            "Enrolador",
            "Asistencia",
            "Asistio",
            "Estado en el curso"
        ];
    }
}
