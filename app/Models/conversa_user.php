<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversa_user extends Model
{

     public function participante(){
         return $this->belongsTo(Participante::class);
     } 
    public function conversa(){
      return $this->belongsTo(conversa::class);
    }
    use HasFactory;

    protected $table = "conversa_user";

    protected $fillable = [
        "user_id",
        "conversa_id",
        "conteudo",
    ];
}
