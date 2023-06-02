<?php

namespace App\Exports;

use App\Models\Compliance;
use App\Models\Departament;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ComplianceExport implements FromCollection, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return collect($this->data);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Registrado por',
            'Data de registro',
            'Classificação',
            'Cliente',
            'Não conformidade',
            'Ação imediata',
            'Departamento responsável',
            'Status',
            'Prazo',
            'Criado em',
            'Última atualização'
        ];
    }
}
