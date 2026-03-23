<?php

namespace LaravelEnso\Audits\Contracts;

interface Auditable
{
    public function auditableAttributes(): array;
}
