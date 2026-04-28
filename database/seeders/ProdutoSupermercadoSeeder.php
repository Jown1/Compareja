<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSupermercadoSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['produto_id' => 1,  'supermercado_id' => 1],
            ['produto_id' => 1,  'supermercado_id' => 2],
            ['produto_id' => 2,  'supermercado_id' => 1],
            ['produto_id' => 2,  'supermercado_id' => 3],
            ['produto_id' => 3,  'supermercado_id' => 2],
            ['produto_id' => 3,  'supermercado_id' => 4],
            ['produto_id' => 4,  'supermercado_id' => 3],
            ['produto_id' => 4,  'supermercado_id' => 5],
            ['produto_id' => 5,  'supermercado_id' => 1],
            ['produto_id' => 5,  'supermercado_id' => 6],
            ['produto_id' => 6,  'supermercado_id' => 2],
            ['produto_id' => 6,  'supermercado_id' => 7],
            ['produto_id' => 7,  'supermercado_id' => 4],
            ['produto_id' => 7,  'supermercado_id' => 8],
            ['produto_id' => 8,  'supermercado_id' => 5],
            ['produto_id' => 8,  'supermercado_id' => 9],
            ['produto_id' => 9,  'supermercado_id' => 6],
            ['produto_id' => 9,  'supermercado_id' => 10],
            ['produto_id' => 10, 'supermercado_id' => 7],
            ['produto_id' => 10, 'supermercado_id' => 1],
            ['produto_id' => 11, 'supermercado_id' => 8],
            ['produto_id' => 12, 'supermercado_id' => 9],
            ['produto_id' => 13, 'supermercado_id' => 10],
            ['produto_id' => 14, 'supermercado_id' => 2],
            ['produto_id' => 15, 'supermercado_id' => 3],
            ['produto_id' => 16, 'supermercado_id' => 4],
            ['produto_id' => 17, 'supermercado_id' => 5],
            ['produto_id' => 18, 'supermercado_id' => 6],
            ['produto_id' => 19, 'supermercado_id' => 7],
            ['produto_id' => 20, 'supermercado_id' => 8],
            ['produto_id' => 21, 'supermercado_id' => 9],
            ['produto_id' => 22, 'supermercado_id' => 10],
            ['produto_id' => 23, 'supermercado_id' => 1],
            ['produto_id' => 24, 'supermercado_id' => 2],
            ['produto_id' => 25, 'supermercado_id' => 3],
            ['produto_id' => 26, 'supermercado_id' => 4],
            ['produto_id' => 27, 'supermercado_id' => 5],
            ['produto_id' => 28, 'supermercado_id' => 6],
            ['produto_id' => 29, 'supermercado_id' => 7],
            ['produto_id' => 30, 'supermercado_id' => 8],
            ['produto_id' => 31, 'supermercado_id' => 9],
            ['produto_id' => 32, 'supermercado_id' => 10],
            ['produto_id' => 33, 'supermercado_id' => 1],
            ['produto_id' => 34, 'supermercado_id' => 2],
            ['produto_id' => 35, 'supermercado_id' => 3],
            ['produto_id' => 1,  'supermercado_id' => 3],
            ['produto_id' => 2,  'supermercado_id' => 4],
            ['produto_id' => 3,  'supermercado_id' => 5],
            ['produto_id' => 4,  'supermercado_id' => 6],
            ['produto_id' => 5,  'supermercado_id' => 7],
            ['produto_id' => 6,  'supermercado_id' => 8],
            ['produto_id' => 7,  'supermercado_id' => 9],
            ['produto_id' => 8,  'supermercado_id' => 10],
            ['produto_id' => 9,  'supermercado_id' => 1],
            ['produto_id' => 10, 'supermercado_id' => 2],
            ['produto_id' => 11, 'supermercado_id' => 4],
            ['produto_id' => 12, 'supermercado_id' => 5],
            ['produto_id' => 13, 'supermercado_id' => 6],
            ['produto_id' => 14, 'supermercado_id' => 7],
            ['produto_id' => 15, 'supermercado_id' => 8],
            ['produto_id' => 16, 'supermercado_id' => 9],
            ['produto_id' => 17, 'supermercado_id' => 10],
            ['produto_id' => 18, 'supermercado_id' => 1],
            ['produto_id' => 19, 'supermercado_id' => 2],
            ['produto_id' => 20, 'supermercado_id' => 3],
            ['produto_id' => 21, 'supermercado_id' => 4],
            ['produto_id' => 22, 'supermercado_id' => 5],
            ['produto_id' => 23, 'supermercado_id' => 6],
            ['produto_id' => 24, 'supermercado_id' => 7],
            ['produto_id' => 25, 'supermercado_id' => 8],
            ['produto_id' => 26, 'supermercado_id' => 9],
            ['produto_id' => 27, 'supermercado_id' => 10],
            ['produto_id' => 28, 'supermercado_id' => 1],
            ['produto_id' => 29, 'supermercado_id' => 2],
            ['produto_id' => 30, 'supermercado_id' => 3],
            ['produto_id' => 31, 'supermercado_id' => 4],
            ['produto_id' => 32, 'supermercado_id' => 5],
            ['produto_id' => 33, 'supermercado_id' => 6],
            ['produto_id' => 34, 'supermercado_id' => 7],
            ['produto_id' => 35, 'supermercado_id' => 8],
        ];

        foreach ($data as &$row) {
            $row['created_at'] = now();
            $row['updated_at'] = now();
        }

        DB::table('produto_supermercado')->insert($data);
    }
}
