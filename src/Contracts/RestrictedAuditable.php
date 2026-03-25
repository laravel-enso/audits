<?php

namespace LaravelEnso\Audits\Contracts;

interface RestrictedAuditable
{
    public function auditableAttributes(): array;
}
