<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoCategoriaCidadeSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['produto_id' => 1,  'categoria_id' => 1,  'cidade_id' => 1],
            ['produto_id' => 1,  'categoria_id' => 1,  'cidade_id' => 4],
            ['produto_id' => 1,  'categoria_id' => 1,  'cidade_id' => 7],
            ['produto_id' => 2,  'categoria_id' => 2,  'cidade_id' => 2],
            ['produto_id' => 2,  'categoria_id' => 2,  'cidade_id' => 5],
            ['produto_id' => 2,  'categoria_id' => 2,  'cidade_id' => 8],
            ['produto_id' => 3,  'categoria_id' => 3,  'cidade_id' => 3],
            ['produto_id' => 3,  'categoria_id' => 3,  'cidade_id' => 6],
            ['produto_id' => 3,  'categoria_id' => 3,  'cidade_id' => 9],
            ['produto_id' => 4,  'categoria_id' => 4,  'cidade_id' => 4],
            ['produto_id' => 4,  'categoria_id' => 4,  'cidade_id' => 7],
            ['produto_id' => 4,  'categoria_id' => 4,  'cidade_id' => 10],
            ['produto_id' => 5,  'categoria_id' => 5,  'cidade_id' => 5],
            ['produto_id' => 5,  'categoria_id' => 5,  'cidade_id' => 11],
            ['produto_id' => 5,  'categoria_id' => 5,  'cidade_id' => 12],
            ['produto_id' => 6,  'categoria_id' => 6,  'cidade_id' => 6],
            ['produto_id' => 6,  'categoria_id' => 6,  'cidade_id' => 13],
            ['produto_id' => 6,  'categoria_id' => 6,  'cidade_id' => 14],
            ['produto_id' => 7,  'categoria_id' => 7,  'cidade_id' => 7],
            ['produto_id' => 7,  'categoria_id' => 7,  'cidade_id' => 15],
            ['produto_id' => 7,  'categoria_id' => 7,  'cidade_id' => 16],
            ['produto_id' => 8,  'categoria_id' => 8,  'cidade_id' => 8],
            ['produto_id' => 8,  'categoria_id' => 8,  'cidade_id' => 17],
            ['produto_id' => 8,  'categoria_id' => 8,  'cidade_id' => 18],
            ['produto_id' => 9,  'categoria_id' => 9,  'cidade_id' => 9],
            ['produto_id' => 9,  'categoria_id' => 9,  'cidade_id' => 19],
            ['produto_id' => 9,  'categoria_id' => 9,  'cidade_id' => 20],
            ['produto_id' => 10, 'categoria_id' => 10, 'cidade_id' => 10],
            ['produto_id' => 10, 'categoria_id' => 10, 'cidade_id' => 1],
            ['produto_id' => 10, 'categoria_id' => 10, 'cidade_id' => 2],
        ];

        foreach ($data as &$row) {
            $row['created_at'] = now();
            $row['updated_at'] = now();
        }

        DB::table('produto_categoria_cidade')->insert($data);
    }
}
