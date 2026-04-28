<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupermercadoSeeder extends Seeder
{
    public function run(): void
    {
        $supermercados = [
            ['nome' => 'Pão de Açúcar', 'imagem' => 'pao_de_acucar.jpg'],
            ['nome' => 'Carrefour',     'imagem' => 'carrefour.jpg'],
            ['nome' => 'Extra',         'imagem' => 'extra.jpg'],
            ['nome' => 'Walmart',       'imagem' => 'walmart.jpg'],
            ['nome' => 'Atacadão',      'imagem' => 'atacadao.jpg'],
            ['nome' => 'Dia',           'imagem' => 'dia.jpg'],
            ['nome' => 'Assaí',         'imagem' => 'assai.jpg'],
            ['nome' => 'Makro',         'imagem' => 'makro.jpg'],
            ['nome' => 'Martins',       'imagem' => 'martins.jpg'],
            ['nome' => 'Tenda',         'imagem' => 'tenda.jpg'],
        ];

        foreach ($supermercados as &$s) {
            $s['created_at'] = now();
            $s['updated_at'] = now();
        }

        DB::table('supermercado')->insert($supermercados);
    }
}
