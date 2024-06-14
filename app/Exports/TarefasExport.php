<?php

namespace App\Exports;

use App\Models\Tarefa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class TarefasExport implements FromCollection, WithHeadings, WithMapping
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
        return ['ID da Tarefa',
                'Tarefa', 
                'Data Limite Conclusão', 
                ];
    }

    public function map($linha): array
    {
        //dd($linha);
        return [
            $linha->id,
            $linha->tarefa,
            date('d/m/Y',strtotime($linha->data_limite_conclusao))
        ];
    }
}
