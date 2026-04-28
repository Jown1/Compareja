<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nome' => 'Eletrônicos'],
            ['nome' => 'Móveis'],
            ['nome' => 'Roupas'],
            ['nome' => 'Brinquedos'],
            ['nome' => 'Esportes'],
            ['nome' => 'Livros'],
            ['nome' => 'Ferramentas'],
            ['nome' => 'Automóveis'],
            ['nome' => 'Imóveis'],
            ['nome' => 'Beleza e Saúde'],
            ['nome' => 'Alimentos'],
            ['nome' => 'Acessórios'],
            ['nome' => 'Instrumentos Musicais'],
            ['nome' => 'Artigos para Bebês'],
            ['nome' => 'Produtos para Animais de Estimação'],
            ['nome' => 'Produtos de Limpeza'],
            ['nome' => 'Produtos de Cuidado Pessoal'],
            ['nome' => 'Equipamentos de Escritório'],
            ['nome' => 'Suprimentos de Escritório'],
        ];

        foreach ($categorias as &$c) {
            $c['created_at'] = now();
            $c['updated_at'] = now();
        }

        DB::table('categoria')->insert($categorias);
    }
}
