<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Felipe Ferro',
            'email' => 'felipe1996ferro@gmail.com',
            'password' => bcrypt('F@5t2wdc')
        ]);
    }
}
