<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    
    public function conversa(){
      return $this->belongsTo(conversa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        "conversa_id",
        "user_id"
    ];
    protected $table = "participantes";
}
