<?php

namespace LaravelEnso\Audits;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->load();
    }

    private function load()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/audits.php', 'enso.audits');
        $this->app->register(AuditServiceProvider::class);
    }
}
