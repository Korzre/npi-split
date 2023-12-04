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
        Schema::create("usuarios", function (Blueprint $table) {
            $table->increments("id_usuario");
            $table->string("nome", 40);
            $table->string("senha",20);
            $table->string("email",100);
            $table->string("matricula",18);
            $table->string("pix", 80)->nullable();
            $table->unsignedInteger("id_acesso");
            $table->timestamps();


            $table->foreign("id_acesso")
                  ->references("id_acesso")
                  ->on("acessos")
                  ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
