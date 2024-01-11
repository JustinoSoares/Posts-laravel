<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logar extends Component
{

    public $email;
    public $password;

    public function render()
    {
        return view('livewire.logar');
    }

    // public function logar(){
    //   $this->validate([
    //       "email" => ["required", "email"],
    //       "password" => ["required"]
    //     ]);

    //     if(auth::attempt(['email' => $this->email, 'password' => $this->passord])){
            
    //         return redirect("/perfil");
    //     }else{
    //         session()->flash('erro', 'Credenciais inválidas.');
    //     }
    // }
}
