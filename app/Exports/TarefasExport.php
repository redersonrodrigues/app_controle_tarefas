<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;

class TarefasExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //       return Tarefa::all();
        // dd(auth()->user()->tarefas()->get());
        // com base nos relacionamentos User->Tarefa retorna apenas dados do usuário
        return auth()->user()->tarefas()->get();
    }
}
