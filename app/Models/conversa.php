<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversa extends Model
{

    public function users(){
        return $this->belongsToMany(User::class);
    } 
    
    public function participantes(){
        return $this->hasMany(Participante::class);
    }
    public function mensagem(){
        return $this->hasMany(conversa_user::class);
    }
    
    protected $fillable =[
        "user_envia_id", 
        "user_recebe_id",	
        "id",
    ];
    protected $table = 'conversa';
    // use HasFactory;
}

