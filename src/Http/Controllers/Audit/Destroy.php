<?php

namespace LaravelEnso\Audits\Http\Controllers\Audit;

use LaravelEnso\Audits\Models\Audit;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Audit $audit)
    {
        $audit->delete();

        return [
            'message' => __('The audit was successfully deleted'),
            'redirect' => 'system.audit.index',
        ];
    }
}
