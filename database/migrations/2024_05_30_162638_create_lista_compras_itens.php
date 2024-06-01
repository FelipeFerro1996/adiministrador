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
        Schema::create('lista_compras_itens', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('quantidade')->length(11);
            $table->foreignId('lista_compra_id')->references('id')->on('lista_compras');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lista_compras_itens');
    }
};
