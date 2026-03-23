<?php

namespace LaravelEnso\Audits\Http\Controllers\Audit;

use Illuminate\Routing\Controller;
use LaravelEnso\Audits\Forms\Builders\Audit;

class Create extends Controller
{
    public function __invoke(Audit $form)
    {
        return ['form' => $form->create()];
    }
}
