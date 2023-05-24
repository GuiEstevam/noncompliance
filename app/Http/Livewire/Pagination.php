<?php

namespace App\Http\Livewire;

use App\Models\Compliance;
use Livewire\Component;
use Livewire\WithPagination;

class Pagination extends Component
{
    use WithPagination;

    public function render()
    {
        $status = [
            1 => 'Sem tratativa',
            2 => 'Em andamento',
            3 => 'Finalizado',
            4 => 'Em atraso',
        ];
        $compliances = Compliance::with('classification', 'client', 'user', 'departament')->paginate(2);

        return view('livewire.pagination', compact('compliances', 'status'));
    }
}
