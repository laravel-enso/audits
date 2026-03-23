<?php

namespace LaravelEnso\Audits\Http\Controllers\Audit;

use Illuminate\Routing\Controller;
use LaravelEnso\Audits\Forms\Builders\Audit as Form;
use LaravelEnso\Audits\Models\Audit;

class Edit extends Controller
{
    public function __invoke(Audit $audit, Form $form)
    {
        return ['form' => $form->edit($audit)];
    }
}
