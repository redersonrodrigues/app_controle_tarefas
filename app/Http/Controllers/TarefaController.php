<?php

namespace App\Http\Controllers;

use App\Mail\NovaTarefaMail;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TarefaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $name = Auth::user()->name;
        $email = Auth::user()->email;
        return "ID: $id | Nome: $name | Email: $email";

        // //recupera dados do usuario logado com a classe
        // if (Auth::check()) {
        //     $id = Auth::user()->id;
        //     $name = Auth::user()->name;
        //     $email = Auth::user()->email;

        //     return "ID: $id | Nome: $name | Email: $email";
        // } else {
        //     return 'Você não está logado no sistema.';
        // }

        // //recupera dados do usuario logado com methodo
        // if (auth()->check()) {
        //     $id = auth()->user()->id;
        //     $name = auth()->user()->name;
        //     $email = auth()->user()->email;

        //     return "ID: $id | Nome: $name | Email: $email";

        // } else {
        //     return 'Você não está logado no sistema.';
        // }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->all('tarefa', 'data_limite_conclusao');
        $dados['user_id'] = auth()->user()->id;

        //dd($dados);


       $tarefa = Tarefa::create($dados);
       // e-mail do usuário logado (autenticado)
       $destinatario = auth()->user()->email;
       Mail::to($destinatario)->send(new NovaTarefaMail($tarefa));

       return redirect()->route('tarefa.show', ['tarefa' => $tarefa->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tarefa $tarefa)
    {
        return view('tarefa.show', ['tarefa' => $tarefa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tarefa $tarefa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tarefa $tarefa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tarefa $tarefa)
    {
        //
    }
}
