<?php

namespace Elhebert\SubresourceIntegrity;

use Elhebert\SubresourceIntegrity\Components\Link;
use Elhebert\SubresourceIntegrity\Components\Script;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class SriServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Sri::class, function () {
            return new Sri(config('subresource-integrity.algorithm'));
        });

        $this->app->alias(Sri::class, 'sri');

        $this->mergeConfigFrom(
            __DIR__.'/../config/subresource-integrity.php',
            'subresource-integrity'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/subresource-integrity.php' => config_path('subresource-integrity.php'),
        ]);

        Blade::component('sri.script', Script::class);
        Blade::component('sri.link', Link::class);
    }
}
