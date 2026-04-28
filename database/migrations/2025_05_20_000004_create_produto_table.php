<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produto', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 200);
            $table->string('fabricante', 200)->nullable();
            $table->string('descricao', 500)->nullable();
            $table->unsignedBigInteger('id_categoria');
            $table->string('foto', 150)->nullable();
            $table->decimal('preco', 10, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_categoria')->references('id')->on('categoria')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produto');
    }
};
