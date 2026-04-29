<?php

namespace LaravelEnso\Audits\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use LaravelEnso\Audits\Enums\Event;
use LaravelEnso\Audits\Models\Audit;

class ModelObserver
{
    public function created(Model $model): void
    {
        $auditableAttributes = $this->auditableAttributes($model);

        $changes = $auditableAttributes !== null
            ? $model->only($auditableAttributes)
            : $model->getAttributes();

        $this->log(Event::Created, $changes, $model);
    }

    public function updated(Model $model): void
    {
        $auditableAttributes = $this->auditableAttributes($model);

        $after = $auditableAttributes !== null
            ? Arr::only($model->getChanges(), $auditableAttributes)
            : $model->getChanges();

        $before = Arr::only($model->getPrevious(), array_keys($after));

        $changes = ['before' => $before, 'after' => $after];

        $this->log(Event::Updated, $changes, $model);
    }

    public function deleted(Model $model): void
    {
        $auditableAttributes = $this->auditableAttributes($model);

        $changes = $auditableAttributes !== null
            ? $model->only($auditableAttributes)
            : $model->getAttributes();

        $this->log(Event::Deleted, $changes, $model);
    }

    protected function log(Event $event, array $changes, Model $model): void
    {
        Audit::create([
            'event' => $event,
            'auditable_type' => get_class($model),
            'auditable_id' => $model->id,
            'changes' => $changes,
        ]);
    }

    private function auditableAttributes(Model $model): ?array
    {
        if (method_exists($model, 'auditableAttributes')) {
            return $model->auditableAttributes();
        }

        return isset($model->auditableAttributes)
            ? $model->auditableAttributes
            : null;
    }
}
