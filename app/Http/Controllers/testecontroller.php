<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\User;
use Illuminate\Http\Request;

class testecontroller extends Controller
{

    public function index(){
        
        $user = User::find(16);

        $post = posts::find(1);

        // $post = posts::create([
        //     "text" => "Postamos sim coisas boas",
        //     "user_id" => 16,
        // ]);
        
        // $user->comentarios()->create([
        //     "text" => "Está muito bom irmão",
        //     "post_id" => 1,
        //  ]);

         $c = $user->comentarios->where("post_id", 1);
    
     
        // $commit = $user->comentarios()->get();

        
        return view("teste",[
            
        
        ]);
    }

    



    //paginação
    // public function index(){
        
    //     $user = User::paginate(5);
    //     return view("/app",[
    //         "users" => $user,
    //     ]);

    // }
}
