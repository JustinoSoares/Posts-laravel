<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
   public function cometarios(){
    return $this->hasMany(comentarios::class);
   }
   
   public function users(){
    return $this->belongsTo(User::class);
   }

    public function files(){
    return $this->hasMany(files::class);
   }
   


   //Dando permisão para mim inserir dados nas tabelas do banco de dados
   protected $fillable = [
    "conteudo ",
     "text",
      "reacao",
      "user_id",
   ];

}
