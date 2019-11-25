<?php

namespace TPenaranda\Duckform\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use TPenaranda\Duckform\Models\Form;

class DuckformServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        Route::group([
            'namespace' => 'TPenaranda\Duckform\Http\Controllers',
            'prefix' => 'api/duckforms',
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
        });
    }

    public function register()
    {
        $this->app->singleton('tpenaranda-duckform', function () {
            return new Form();
        });
    }
}
