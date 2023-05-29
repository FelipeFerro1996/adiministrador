<?php

namespace App\Providers;

use App\Models\Especie;
use Illuminate\Support\ServiceProvider;

class ServiceEspecie extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    static function getAllEspecies(){
        $especies = new Especie();
        $especies = $especies->get();
        return $especies;
    }
}
