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
        Schema::create("produto_consumido", function (Blueprint $table){
                $table->increments("id_produto_cons");
                $table->integer("quantidade");
                $table->unsignedInteger("id_usuario");
                $table->unsignedInteger("id_produto");
                $table->boolean("pago")->default(false);
                $table->timestamps();

                $table->foreign("id_usuario")
                      ->references("id_usuario")
                      ->on("usuarios")
                      ->onDelete("cascade");


                $table->foreign("id_produto")
                      ->references("id")
                      ->on("produtos")
                      ->onDelete("cascade");


        });
    }

    public function down(): void
    {
        Schema::dropIfExists("produto_consumido");
    }
};
