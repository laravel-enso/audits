<?php

namespace LaravelEnso\Audits\Tables\Builders;

use Illuminate\Database\Eloquent\Builder;
use LaravelEnso\Audits\Models\Audit as Model;
use LaravelEnso\Tables\Contracts\Table;

class Audit implements Table
{
    private const TemplatePath = __DIR__.'/../Templates/audits.json';

    public function query(): Builder
    {
        return Model::with(['createdBy.avatar', 'createdBy.person'])
            ->selectRaw('
            audits.id, audits.event, audits.auditable_type, audits.auditable_id,
            audits.changes, audits.created_by, audits.created_at
        ');
    }

    public function templatePath(): string
    {
        return self::TemplatePath;
    }
}
