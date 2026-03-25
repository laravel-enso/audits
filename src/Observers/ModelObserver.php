<?php

namespace LaravelEnso\Audits\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use LaravelEnso\Audits\Contracts\RestrictedAuditable;
use LaravelEnso\Audits\Enums\Event;
use LaravelEnso\Audits\Models\Audit;

class ModelObserver
{
    public function created(Model $model)
    {
        $changes = $model instanceof RestrictedAuditable
            ? $model->only($model->auditableAttributes())
            : $model->getAttributes();

        $this->log(Event::Created, $changes, $model);
    }

    public function updated(Model $model)
    {
        $after = $model instanceof RestrictedAuditable
            ? Arr::only($model->getChanges(), $model->auditableAttributes())
            : $model->getChanges();

        $before = Arr::only($model->getPrevious(), array_keys($after));

        $changes = ['before' => $before, 'after' => $after];

        $this->log(Event::Updated, $changes, $model);
    }

    public function deleted(Model $model)
    {
        $changes = $model instanceof RestrictedAuditable
            ? $model->only($model->auditableAttributes())
            : $model->getAttributes();

        $this->log(Event::Deleted, $changes, $model);
    }

    protected function log(Event $event, array $changes, Model $model)
    {
        Audit::create([
            'event' => $event,
            'auditable_type' => get_class($model),
            'auditable_id' => $model->id,
            'changes' => $changes,
        ]);
    }
}
