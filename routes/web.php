<?php

use App\Http\Controllers\TarefaController;
use App\Mail\MensagemTestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('bem-vindo');
});

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
//     ->name('home')
//     ->middleware('verified');

// tarefa
Route::resource('/tarefa', TarefaController::class)
    ->middleware('verified');

// emails
Route::get('mensagem-teste', function () {
    return new MensagemTestMail();
    // Mail::to('rederson_rodrigues@yahoo.com.br')->send(new MensagemTestMail());
    // return "Email enviado com sucesso.";
});
