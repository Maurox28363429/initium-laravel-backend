<?php

namespace App\Exports;

use App\Models\Clientes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientesExport implements FromCollection,WithHeadings
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
        return Clientes::all();
    }
    public function title(): string
    {
        return 'Clientes';
    }
    public function headings():array
    {
        return [
            'id',
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
            "curso_id"
        ];
    }
}
