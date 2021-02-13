<?php

namespace ElasticAuth\SocialiteProvider;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ElasticAuthSocialiteServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        $this->publishes([
            __DIR__ . '/../stubs/App/Http/Controllers' => app_path('App/Controllers'),
            __DIR__ . '/../stubs/routes/elasticauthsocialiteprovider.php' => app_path('routes'),
        ], 'elasticauth-socialiteprovider');

    }
}