<?php

namespace App\Http\Controllers;

use App\Models\files;
use App\Models\posts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class Authregistercontroller extends Controller
{
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "name" => ["required", "string"],
      "email" => ["required", "email"],
      "password" => ["required", "min:8"],
      "senha" => ["required"],
      "sexo" => ["required"],
      "data_nasc" => ["required"],
      "profile_photo_path" => ["image", "max:1024", "mimes:jpg,JPG,jpeg,JPEG,png,PNG,GIF,gif,svg"],
    ]);
    if ($validator->fails()) {
      return redirect("/logar")->with("erro", "erro");
    }
    if ($request->senha == $request->password) {
      //   $extensao = [];

      $user = User::create([
        "name" => $request->name,
        "email" => $request->email,
        "sexo" => $request->sexo,
        "data_nasc" => $request->data,
        "profile_photo_path" => "build/assets/img/images.jpg",
        "password" => Hash::make($request->password),
      ]);
      Auth::login($user);
      return redirect("/inicio");
    } else {
      return redirect("/logar")->with("erro", "Ao cadastrar as senhas devem ser as mesmas");
    }
  }
  //logout
  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect("/logar");
  }

  public function index()
  {
    return view("cadastro");
  }

  public function inicio()
  {
    $id =  Auth::id();
    $user = User::find($id);

    // $user_id = Auth::id();
    //   $user = User::get();
    //pega todos os posts e verifica se existe ou não posts
    $postsAll = posts::get();
    //posts com imagens 
    $posts = posts::select('posts.text', 'posts.id', 'posts.user_id', 'posts.created_at', 'files.way', 'files.post_id', 'users.name', 'users.profile_photo_path', 'users.id')
      ->join('files', 'posts.id', '=', 'files.post_id')
      ->join('users', 'posts.user_id', '=', 'users.id')
      //  ->where("users.id", $user_id)
      ->orderBy("posts.id", "desc")
      ->get();
    //posts sem imagem imagens 
    //  $postsWithOut = posts::select('posts.text', 'posts.id','posts.user_id', 'users.name','users.profile_photo_path', 'users.id')
    //    ->join('users', 'posts.user_id', '=', 'users.id')
    //    ->orderBy("posts.created_at", "desc")
    //    ->get()->toArray();

    //junção dos dois posts para mostrar os que têm imagem e os que não

    $bool = false;
    if ($postsAll->count() == 0) {
      $bool = true;
    }

    return view("/inicio", [
      "user" => $user,
      "posts" => $posts,
      "bool" => $bool,

    ]);
  }
  //criar posts
  public function perfil()
  {
    $user_id = Auth::id();
    $user_auth = User::find($user_id);
    //pega todos os posts e verifica se existe ou não posts
    $postsAll = $user_auth->posts()->get();
    //posts com imagens 
    $posts = posts::select('posts.text', 'posts.id', 'posts.user_id', 'posts.created_at', 'files.way', 'files.post_id', 'users.name', 'users.profile_photo_path', 'users.id')
      ->join('files', 'posts.id', '=', 'files.post_id')
      ->join('users', 'posts.user_id', '=', 'users.id')
      ->where("users.id", $user_id)
      ->orderBy("posts.id", "desc")
      ->get();

    //verificação se os usuários são os mesmos
    $verificar_se_os_users_sao_diferentes = true;

    $bool = false;
    if ($postsAll->count() == 0) {
      $bool = true;
    }
    return view("perfil", [
      "user_auth" => $user_auth,
      "user" => $user_auth,
      "posts" => $posts,
      "bool" => $bool,
      "verificar_se_os_users_sao_diferentes" => $verificar_se_os_users_sao_diferentes,
    ]);
  }
  //deletar posts
  public function delete($id)
  {
    $post = posts::find($id);
    $file = files::where("post_id",$id);
    $file->delete();
    $post->delete();
    return  redirect("/perfil")->with("sucess", "Post deletado com sucesso");
  }

  public function foto_perfil(Request $request)
  {
    $validator = Validator::make($request->all(), [
      "post_image" => ['image', 'mimes:png,jpg,jpeg,PNG,JPG,JPEG,gif,GIF', 'max:2048'],
    ]);
    if ($validator->fails()) {
      return redirect("/inicio")->with("erro", "Não foi possível actualizar a sua foto");
    }

    if ($request->hasFile("foto_perfil") && $request->file("foto_perfil")->isValid()) {

      $image = $request->foto_perfil;
      $imageName = time() . "." . $image->getClientOriginalExtension();
      $way = "/public/image/" . $imageName;
      $image->move(public_path("/public/image/"), $imageName);
      $user_id = Auth::id();
      User::find($user_id)->update([
        "profile_photo_path" => $way,
      ]);
    }
    return redirect("/perfil")->with("sucess", "Foto de perfil actualizada com sucesso");
  }
}
