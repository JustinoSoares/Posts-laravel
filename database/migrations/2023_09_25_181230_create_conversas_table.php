<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('conversas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_envia_id");
            $table->bigInteger("user_recebe_id");
            //definindo data e hora
            $table->timestamps();
        });

        Schema::create('conversa_user', function (Blueprint $table) {
            $table->id();
            $table->text("conteudo");
            $table->string("tipo")->nullable();
              //chaves estrangeiras 
           $table->foreignId("user_id")->constrained()->onUpdate("cascade");
           $table->foreignId("conversa_id")->constrained()->onUpdate("cascade");
           
           $table->timestamps();
      });
    }


  

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conversas');
    }
};
