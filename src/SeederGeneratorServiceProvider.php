<?php

namespace Airondev\SeederGenerator;

use Illuminate\Support\ServiceProvider;

class SeederGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        // Register the commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\Commands\GenerateSeedersCommand::class,
            ]);
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
