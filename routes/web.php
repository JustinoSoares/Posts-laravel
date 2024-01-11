<?php

use App\Http\Controllers\Authlogincontroller;
use App\Http\Controllers\Authregistercontroller;
use App\Http\Controllers\chatController;
use App\Http\Controllers\list_usersControllers;
use App\Http\Controllers\publicsController;
use App\Http\Controllers\testecontroller;
use App\Livewire\Logar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

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
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
})->name('dashboard');

    // Route::get("/app", function(){
    //     $iduser = Auth::user()->id;
    //     return view("app",[
    //     "id" => $iduser,     
    //     ]);
    // });

    
});

// Route::get("/inicio", function(){
//     return view("inicio");
// });

//rota para cadastrar
Route::post('/cadastrar', [Authregistercontroller::class, "store"])->name("insert");
Route::get('/cadastrar', [Authregistercontroller::class, "index"])->name("cadastro_name");


//rotas para logar
Route::get("/logar", [Authlogincontroller::class, "index"])->name("logar");
Route::post("/logar", [Authlogincontroller::class, "store"]);
//rota para logout
Route::post("/logout", [Authregistercontroller::class, "logout"])->name("terminarSessao_name");

//rotas autenticadas 
Route::get("/inicio", [Authregistercontroller::class, "inicio"])->name("inicio_name")->middleware("auth");
Route::get("/perfil", [Authregistercontroller::class, "perfil"])->name("perfil_name")->middleware("auth");

//rota para postagem
Route::post("/postar", [publicsController::class, "postar"])->name("postar_name")->middleware("auth");
    //deletar posts
    Route::delete("/posts/{id}",[Authregistercontroller::class, "delete"])->name("deletePost_name")->middleware("auth");

//rota redirecionar para a publicação
Route::get("/outros_perfis/{id}",[list_usersControllers::class, "redireciona_perfil"])->name("outro_perfil")->middleware("auth");

Route::post("/foto_perfil",[Authregistercontroller::class, "foto_perfil"])->name("foto_perfil")->middleware("auth");
//rotas para o chat
Route::get("/chat",[chatController::class, "index"])->name("chat_name")->middleware("auth");
Route::get("/user/{user_id}",[chatController::class, "privada"])->name("privada.show")->middleware("auth");
Route::post("/grupo/{grupo_id}",[chatController::class, "grupo"])->name("grupo.show")->middleware("auth");
Route::post("/mensagem/{id}",[chatController::class, "mensagem"])->name("mensagem_name")->middleware("auth");
// rota para pegar o usuário que vai receber a mensagem

//rota para exceções e erros
Route::get("/execepção", function(){
    return view("erro");
});




Route::get("/teste", [testecontroller::class, "index"]);

