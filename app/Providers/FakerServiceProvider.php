<?php

namespace App\Providers;

use App\Providers\Picsum\PicsumImage;
use Illuminate\Support\ServiceProvider;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Picsum', function () {
            $faker = \Faker\Factory::create('en_US');
            $faker->addProvider(new PicsumImage($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
