<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authlogincontroller extends Controller
{
    public function store(Request $request)
    {
        $credenciais = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($credenciais)) {
            $id =  Auth::id();
            //abrir sessão
            session_start();
            return redirect("/inicio")->with("sucess", "Logado");
        } else {
            // return back()->withErrors([
            //     'email' => 'The provided credentials do not match our records.',
            // ])->onlyInput('email');    

            return redirect("/logar")->with("erro", "Não foi possível acessar a página, tente novamente");
        }
    }

    public function index()
    {
        return view("logar");
    }
}
