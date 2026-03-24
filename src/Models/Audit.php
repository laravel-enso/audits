<?php

namespace LaravelEnso\Audits\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelEnso\Audits\Enums\Event;
use LaravelEnso\TrackWho\Traits\CreatedBy;

class Audit extends Model
{
    use CreatedBy;

    protected $guarded = [];

    protected $casts = [
        'event' => Event::class,
        'changes' => 'array',
    ];
}
