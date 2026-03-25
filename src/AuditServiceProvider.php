<?php

namespace LaravelEnso\Audits;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use LaravelEnso\Audits\Observers\ModelObserver;
use LaravelEnso\Audits\Services\AuditableModels;

class AuditServiceProvider extends ServiceProvider
{
    public $monitoredModels = [];

    public function boot()
    {
        (new AuditableModels())->handle()
            ->each(fn (string $model) => $model::observe(ModelObserver::class));
    }
}
