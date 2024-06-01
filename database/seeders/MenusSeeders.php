<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            'descricao'=>'Home',
            'link'=>'index',
            'icon'=>'<i class="fa-solid fa-house-user nav-icon"></i>',
            'descricao_link'=>'',
            'ativo'=>1  
        ]);
        DB::table('menus')->insert([
            'descricao'=>'Contas',
            'link'=>'listarContas',
            'icon'=>'<i class="fa-solid fa-dollar-sign nav-icon"></i>',
            'descricao_link'=>'contas',
            'ativo'=>1  
        ]);
        DB::table('menus')->insert([
            'descricao'=>'Parcelas',
            'link'=>'listarParcelas',
            'icon'=>'<i class="fa-solid fa-money-check-dollar nav-icon"></i>',
            'descricao_link'=>'parcelas',
            'ativo'=>1  
        ]);
        DB::table('menus')->insert([
            'descricao'=>'Pets',
            'link'=>'listarPets',
            'icon'=>'<i class="fa-solid fa-dog nav-icon"></i>',
            'descricao_link'=>'pets',
            'ativo'=>1  
        ]);
        DB::table('menus')->insert([
            'descricao'=>'Tarefas',
            'link'=>'listarTarefas',
            'icon'=>'<i class="fa-solid fa-list-check nav-icon"></i>',
            'descricao_link'=>'tarefas',
            'ativo'=>1  
        ]);
    }
}
