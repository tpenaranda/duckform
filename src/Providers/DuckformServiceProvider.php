<?php

namespace TPenaranda\Duckform\Providers;

use Faker\Generator as FakerGenerator;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use TPenaranda\Duckform\Duckform;

class DuckformServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        Route::group([
            'namespace' => 'TPenaranda\Duckform\Http\Controllers',
            'prefix' => 'duckforms',
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
        });
    }

    public function register()
    {
        $this->app->singleton('tpenaranda-duckform', function () {
            $eloquentFactory = EloquentFactory::construct(
                app(FakerGenerator::class),
                __DIR__ . '/../Database/Factories'
            );

            return new Duckform($eloquentFactory);
        });
    }
}
