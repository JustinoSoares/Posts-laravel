<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class files extends Model
{

    public function posts(){
         return $this->belongsTo(posts::class, "post_id");
     }
    // use HasFactory;

    protected $fillable =[
        " descrition", 
        "way",	
        "user_id",	
        "post_id",		
    ];
}
