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

        // Publish the configuration file
        $this->publishes([
            __DIR__.'/../config/seeder-generator.php' => config_path('seeder-generator.php'),
        ], 'config');

        // Merge default configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/seeder-generator.php', 'seeder-generator'
        );
        
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
