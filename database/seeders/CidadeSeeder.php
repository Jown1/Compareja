<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CidadeSeeder extends Seeder
{
    public function run(): void
    {
        $cidades = [
            ['nome' => 'Campinas',             'estado' => 'SP'],
            ['nome' => 'Valinhos',             'estado' => 'SP'],
            ['nome' => 'Vinhedo',              'estado' => 'SP'],
            ['nome' => 'Hortolândia',          'estado' => 'SP'],
            ['nome' => 'Sumaré',               'estado' => 'SP'],
            ['nome' => 'Paulínia',             'estado' => 'SP'],
            ['nome' => 'Indaiatuba',           'estado' => 'SP'],
            ['nome' => 'Americana',            'estado' => 'SP'],
            ['nome' => 'Nova Odessa',          'estado' => 'SP'],
            ['nome' => 'Monte Mor',            'estado' => 'SP'],
            ['nome' => 'Jaguariúna',           'estado' => 'SP'],
            ['nome' => 'Pedreira',             'estado' => 'SP'],
            ['nome' => 'Itatiba',              'estado' => 'SP'],
            ['nome' => 'Amparo',               'estado' => 'SP'],
            ['nome' => "Santa Bárbara d'Oeste",'estado' => 'SP'],
            ['nome' => 'Artur Nogueira',       'estado' => 'SP'],
            ['nome' => 'Cosmópolis',           'estado' => 'SP'],
            ['nome' => 'Mogi Guaçu',           'estado' => 'SP'],
            ['nome' => 'Mogi Mirim',           'estado' => 'SP'],
            ['nome' => 'Limeira',              'estado' => 'SP'],
        ];

        foreach ($cidades as &$c) {
            $c['created_at'] = now();
            $c['updated_at'] = now();
        }

        DB::table('cidade')->insert($cidades);
    }
}
