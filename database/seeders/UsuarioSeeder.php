<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuario')->insert([
            [
                'nome'          => 'Jonas Lima de Almeida',
                'email'         => 'jonas.almeida@gmail.com',
                'senha'         => Hash::make('123456'),
                'profile_image' => 'jown_profile.jpg',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
