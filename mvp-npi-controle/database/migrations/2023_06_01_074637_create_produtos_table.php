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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string("descricao", 50);
            $table->decimal("preco", 8,2);
            $table->integer("quantidade");
            $table->unsignedInteger("id_usuario");

            $table->timestamps();

            $table->foreign("id_usuario")
                    -> references("id_usuario")
                    -> on("usuarios")
                    ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
