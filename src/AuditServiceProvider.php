<?php

namespace LaravelEnso\Audits;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use LaravelEnso\Audits\Observers\ModelObserver;

class AuditServiceProvider extends ServiceProvider
{
    public $monitoredModels = [];

    public function boot()
    {
        foreach ($this->monitoredModels as $model) {
            $model::observe(ModelObserver::class);
        }
    }
}
