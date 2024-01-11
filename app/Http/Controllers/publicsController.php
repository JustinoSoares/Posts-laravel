<?php

namespace App\Http\Controllers;

use App\Models\files;
use App\Models\posts;
use App\Models\User;
use Illuminate\Auth\Events\Validated;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class publicsController extends Controller
{

  public function postar(Request $request)
  {

    $user_id =  Auth::id();
    $user = User::find($user_id);

    $validator = Validator::make($request->all(), [
      "post_text" => ["required"],
      "post_image.*" => ['image','mimes:png,jpg,jpeg,PNG,JPG,JPEG,gif,GIF', 'max:2048'],
    ]);

    if ($validator->fails()) {
      return redirect("/inicio")->with("erro", "não foi possível publicar");
      // return redirect()->route('/inicio')->withErrors($validator);
    }

    $post = posts::create([
      "text" => $request->post_text,
      "user_id" => $user_id,
    ]);
    //fazer o upload das imagens e criar posts 
    $imagensSalvas = [];
    foreach($request->file("post_image") as $image){
       if($request->hasFile("post_image")){
       $imageName = time()."_".$image->getClientOriginalName();
       $way = "/public/image/".$imageName;
       $image->move(public_path("/public/image/"), $imageName);
       
       //id do post
       $post_id = $post->id;
       $file = files::create([
           "way" => $way,
           "user_id" => $user_id,
           "post_id" =>$post_id,
       ]);

       $imagensSalvas[] = $way;
     }   
   }   
    return redirect("/perfil")->with("sucess", "imagem cadastrada com sucesso");
  }
}
