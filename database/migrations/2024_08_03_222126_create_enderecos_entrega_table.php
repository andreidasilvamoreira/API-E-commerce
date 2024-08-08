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
        Schema::create('enderecos_entregas', function (Blueprint $table) {
            $table->id();
            $table->string('rua', 45);
            $table->string('bairro',45);
            $table->string('cidade',45);
            $table->string('cep', 9)->nullable();
            $table->unsignedBigInteger('usuario_id');

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos_entrega');
    }
};
