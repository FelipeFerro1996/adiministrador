<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('especies')->insert([
            'descricao' => 'Cachorro'
        ]);
        DB::table('especies')->insert([
            'descricao' => 'Gato'
        ]);
    }
}
