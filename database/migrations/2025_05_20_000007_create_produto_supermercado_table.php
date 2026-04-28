<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produto_supermercado', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('supermercado_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
            $table->foreign('supermercado_id')->references('id')->on('supermercado')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produto_supermercado');
    }
};
