<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class list_usersControllers extends Controller
{
  //criar posts
  public function redireciona_perfil($id)
  {
     $user_auth_id = Auth::id();
     //o usuario atenticado
     $user_auth = User::find($user_auth_id);
     //O usuário que lhe visitaram o perfil
     $user = User::find($id);
    //pega todos os posts e verifica se existe ou não posts
    $postsAll = $user->posts()->get();
    //posts com imagens 
    $posts = posts::select('posts.text', 'posts.id','posts.user_id','posts.created_at','files.way', 'files.post_id', 'users.name','users.profile_photo_path', 'users.id')
    ->join('files', 'posts.id', '=', 'files.post_id')
    ->join('users', 'posts.user_id', '=', 'users.id')
    ->where("users.id", $id)
    ->orderBy("posts.id", "desc")
    ->get();
    //posts sem imagem imagens 
    // $postsWithOut = posts::select('posts.text', 'posts.id','posts.created_at','users.name')
    //   ->join('users', 'posts.user_id', '=', 'users.id')
    //   ->where("users.id", $id)
    //   ->orderBy("posts.id", "desc")
    //   ->get()->toArray();
    

    //junção dos dois posts para mostrar os que têm imagem e os que não
    // $posts = array_map(null, $postsWith, $postsWithOut);


    $bool = false;
    if ($postsAll->count() == 0) {
      $bool = true;
    }
    $verificar_se_os_users_sao_diferentes = false;
    if($id == $user_auth_id){
      $verificar_se_os_users_sao_diferentes = true;
    }

    return view("perfil", [
      "user" => $user,
      "user_auth" => $user_auth,
      "posts" => $posts,
      "bool" => $bool,
      "verificar_se_os_users_sao_diferentes"=> $verificar_se_os_users_sao_diferentes,
      // "hora" => $hora,
    ]);
  }

  // public function publicacao(){
  //    // $user_id = Auth::id();
  //     $user = User::get();
  //    //pega todos os posts e verifica se existe ou não posts
  //    $postsAll = posts::get();
     
  //    //posts com imagens 
  //    $postsWith = posts::select('posts.text', 'posts.id', 'files.way', 'files.post_id', 'users.name')
  //      ->join('files', 'posts.id', '=', 'files.post_id')
  //      ->join('users', 'posts.user_id', '=', 'users.id')
  //      ->orderBy("posts.created_at")
  //      ->get()->toArray();
  //    //posts sem imagem imagens 
  //    $postsWithOut = posts::select('posts.text', 'posts.id', 'users.name')
  //      ->join('users', 'posts.user_id', '=', 'users.id')
  //      ->orderBy("posts.created_at")
  //      ->get()->toArray();
 
  //    //junção dos dois posts para mostrar os que têm imagem e os que não
  //    $posts = array_map(null, $postsWith, $postsWithOut);
  //    $bool = false;
  //    if ($postsAll->count() == 0) {
  //       $bool = true;
  //    }
 
  //    return view("inicio", [
  //      "user" => $user,
  //      "posts" => $posts,
  //      "bool" => $bool,
  //      "postWith" => $postsWith,
  //      "postsWithOut" => $postsWithOut,
  //    ]);
  // }
}
