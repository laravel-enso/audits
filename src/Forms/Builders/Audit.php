<?php

namespace LaravelEnso\Audits\Forms\Builders;

use LaravelEnso\Audits\Models\Audit as Model;
use LaravelEnso\Forms\Services\Form;

class Audit
{
    private const TemplatePath = __DIR__.'/../Templates/audit.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form($this->templatePath());
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Model $audit)
    {
        return $this->form->edit($audit);
    }

    protected function templatePath(): string
    {
        return self::TemplatePath;
    }
}
