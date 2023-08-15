<?php

namespace App\Exports;

use App\Models\{
    Clientes,
    User,
    form_seg,
    form_eci,
    forminduccion,
    Cursos
};
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AsistenciaExport implements FromCollection,WithHeadings,ShouldAutoSize
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
        $curso=Cursos::where('id',$curso_id)->limit(1)->first();
        $curso_name=strtolower($curso->name);
        $curso_name_parse="";
        if(str_contains($curso_name, "sic")){
            $curso_name_parse = 'SIC';
        }
        if(str_contains($curso_name, "eci")){
            $curso_name_parse = 'ECI';
        }
        if(str_contains($curso_name, "gol")){
            $curso_name_parse = 'GOL';
        }

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
        $response=$data->map(function($client)use($curso_id,$curso_name_parse){    
        switch ($curso_name_parse) {
            case 'SIC':

            $form_data=form_seg::query()->where('user_id',$client->user_id)->first();
            $user_data=User::query()->where('id','user_id')->first();
            return [
                "ID"=>$client->id,
                "Nombre"=>$client->name." ".$client->last_name,
                "NameTag"=>$client->Nickname ?? "N/D",
                "Telefono"=>$client->phone,
                "Enrolador"=>$client->reference_person,
                "Asistencia del curso"=>($client->assist)? "Asistio":"No asistio",
                "Asistio del dia"=>($client->llego)? "Asistio":"No asistio",
                "Estudiante paso"=>($client->curso_id==$curso_id)? "En curso":"Promovido",
                "interpersonalObjectives1"=> $form_data->interpersonalObjectives1 ?? "No definido",
                "interpersonalObjectives2"=> $form_data->interpersonalObjectives2 ?? "No definido",
                "professionalObjectives1"=> $form_data->professionalObjectives1 ?? "No definido",
                "professionalObjectives2"=> $form_data->professionalObjectives2 ?? "No definido",
                "objectiveInTheCommunity1"=> $form_data->objectiveInTheCommunity1 ?? "No definido",
                "objectiveInTheCommunity2"=> $form_data->objectiveInTheCommunity2 ?? "No definido",
                "recursante"=> $form_data->recursante ?? "No definido"
            ];
            break;

            case 'ECI':
            $form_data=form_eci::query()->where('user_id',$client->user_id)->first();
            $user_data=User::query()->where('id','user_id')->first();
            return [
                "ID"=>$client->id,
                "Nombre"=>$client->name." ".$client->last_name,
                "NameTag"=>$client->Nickname ?? "N/D",
                "Telefono"=>$client->phone,
                "Enrolador"=>$client->reference_person,
                "Asistencia del curso"=>($client->assist)? "Asistio":"No asistio",
                "Asistio del dia"=>($client->llego)? "Asistio":"No asistio",
                "Estudiante paso"=>($client->curso_id==$curso_id)? "En curso":"Promovido",
                "Aceptación de reglas"=>($user_data)? $user_data->reglas:'No aceptadas',
                "question_1"=> ($form_data)? $form_data->question_1 :"No establecido",
                "question_2"=> ($form_data)? $form_data->question_2 :"No establecido",
                "question_3"=> ($form_data)? $form_data->question_3 :"No establecido",
                "question_4"=> ($form_data)? $form_data->question_4 :"No establecido",
                "question_5"=> ($form_data)? $form_data->question_5 :"No establecido",
                "question_6"=> ($form_data)? $form_data->question_6 :"No establecido",
                "question_7"=> ($form_data)? $form_data->question_7 :"No establecido",
                "question_8"=> ($form_data)? $form_data->question_8 :"No establecido",
                "question_9"=> ($form_data)? $form_data->question_9 :"No establecido",
                "question_10"=> ($form_data)? $form_data->question_10 :"No establecido",
                "question_11"=> ($form_data)? $form_data->question_11 :"No establecido",
                "question_12"=> ($form_data)? $form_data->question_12 :"No establecido",
                "question_13"=> ($form_data)? $form_data->question_13 :"No establecido",
                "question_14"=> ($form_data)? $form_data->question_14 :"No establecido",
                "objective_1"=> ($form_data)? $form_data->objective_1 :"No establecido",
                "objective_2"=> ($form_data)? $form_data->objective_2 :"No establecido",
                "objective_3"=> ($form_data)? $form_data->objective_3 :"No establecido",
                "recursante"=> ($form_data)? $form_data->recursante :"No establecido"
            ];
            break;

            case 'GOL':

            $form_data=forminduccion::query()->where('user_id',$client->user_id)->first();
            $user_data=User::query()->where('id','user_id')->first();
            return [
                "ID"=>$client->id,
                "Nombre"=>$client->name." ".$client->last_name,
                "NameTag"=>$client->Nickname ?? "N/D",
                "Telefono"=>$client->phone,
                "Enrolador"=>$client->reference_person,
                "Asistencia del curso"=>($client->assist)? "Asistio":"No asistio",
                "Asistio del dia"=>($client->llego)? "Asistio":"No asistio",
                "Estudiante paso"=>($client->curso_id==$curso_id)? "En curso":"Promovido",
                "question_1"=> $form_data->question_1 ?? 'no definido',
                "question_2"=> $form_data->question_2 ?? 'no definido',
                "question_3"=> $form_data->question_3 ?? 'no definido',
                "question_4"=> $form_data->question_4 ?? 'no definido',
                "question_5"=> $form_data->question_5 ?? 'no definido',
                "question_6"=> $form_data->question_6 ?? 'no definido',
                "objective_1"=> $form_data->objective_1 ?? 'no definido',
                "objective_2"=> $form_data->objective_2 ?? 'no definido',
                "objective_3"=> $form_data->objective_3 ?? 'no definido',
                "recursante"=> $form_data->recursante ?? 'no definido'
            ];
            break;

            default:
            return [
                "ID"=>$client->id,
                "Nombre"=>$client->name." ".$client->last_name,
                "NameTag"=>$client->Nickname ?? "N/D",
                "Telefono"=>$client->phone,
                "Enrolador"=>$client->reference_person,
                "Asistencia del curso"=>($client->assist)? "Asistio":"No asistio",
                "Asistio del dia"=>($client->llego)? "Asistio":"No asistio",
                "Estudiante paso"=>($client->curso_id==$curso_id)? "En curso":"Promovido"
            ];
            break;
        }
        });
        return $response;
    }
    public function title(): string
    {
        return 'Clientes';
    }
    public function headings():array
    {
        $curso_id=$this->parametros["curso_id"];
        $curso=Cursos::where('id',$curso_id)->limit(1)->first();
        $curso_name=strtolower($curso->name);
        $name="";
        if(str_contains($curso_name, "sic")){
            $name = 'SIC';
        }
        if(str_contains($curso_name, "eci")){
            $name = 'ECI';
        }
        if(str_contains($curso_name, "gol")){
            $name = 'GOL';
        }
        switch ($name) {
            case 'SIC':
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
            break;

            case 'ECI':
            return [
                "ID",
                "Nombre",
                "NameTag",
                "Telefono",
                "Enrolador",
                "Asistencia",
                "Asistio",
                "Estado en el curso",
                "Aceptación de reglas",
                "question_1",
                "question_2",
                "question_3",
                "question_4",
                "question_5",
                "question_6",
                "question_7",
                "question_8",
                "question_9",
                "question_10",
                "question_11",
                "question_12",
                "question_13",
                "question_14",
                "objective_1",
                "objective_2",
                "objective_3",
                "recursante"
            ];
            break;

            case 'GOL':
            return [
                "ID",
                "Nombre",
                "NameTag",
                "Telefono",
                "Enrolador",
                "Asistencia",
                "Asistio",
                "Estado en el curso",
                "question_1",
                "question_2",
                "question_3",
                "question_4",
                "question_5",
                "question_6",
                "objective_1",
                "objective_2",
                "objective_3",
                "recursante"
            ];
            break;

            default:
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
                break;
        }
    }
}
