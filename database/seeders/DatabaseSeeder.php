<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsuarioSeeder::class,
            CategoriaSeeder::class,
            CidadeSeeder::class,
            ProdutoSeeder::class,
            SupermercadoSeeder::class,
            ProdutoCategoriaCidadeSeeder::class,
            ProdutoSupermercadoSeeder::class,
        ]);
    }
}
