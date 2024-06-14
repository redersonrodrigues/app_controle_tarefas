<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TarefasExport implements FromCollection, WithHeadings
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

    public function headings(): array  {
        return ['ID da Tarefa','ID do Usuário','Tarefa', 'Data Limite Conclusão', 'Data Criação', 'Data Atualização'];
    }
}
