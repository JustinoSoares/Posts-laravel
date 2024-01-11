<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class comentarios extends Model
{

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function posts(){
        return $this->belongsTo(posts::class);
    }
    

    //Dando permisão para mim inserir dados nas tabelas do banco de dados
   protected $fillable = [
     "text",
     "post_id",
     "user_id",
   ];
    // use HasFactory;
}
