<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produto_categoria_cidade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produto_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('cidade_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('produto_id')->references('id')->on('produto')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categoria')->onDelete('cascade');
            $table->foreign('cidade_id')->references('id')->on('cidade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produto_categoria_cidade');
    }
};
