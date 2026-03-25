<?php

namespace LaravelEnso\Audits\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class AuditableModels
{
    public function handle(): Collection
    {
        return $this->sources()
            ->mapInto(Source::class)
            ->map->get()
            ->filter->isNotEmpty()
            ->collapse()
            ->unique()
            ->values();
    }

    private function sources(): Collection
    {
        return Collection::wrap(Config::get('enso.audits.vendors', ['laravel-enso']))
            ->map(fn ($vendor) => base_path("vendor/{$vendor}"))
            ->filter(fn ($vendor) => File::isDirectory($vendor))
            ->flatMap(fn ($vendor) => File::directories($vendor))
            ->push(base_path());
    }
}
