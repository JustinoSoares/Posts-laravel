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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("conteudo")->nullable();
            $table->text("text")->nullable();
            $table->string("reacao")->nullable();
            //tabela da data e hora;    
            $table->timestamps();
           //chaves estrangeiras;
            $table->foreignId("user_id")
            ->constrained()
            ->onUpdate("cascade")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
