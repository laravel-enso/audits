<?php

namespace LaravelEnso\Audits\Http\Controllers\Audit;

use Illuminate\Routing\Controller;
use LaravelEnso\Audits\Http\Requests\ValidateAudit;
use LaravelEnso\Audits\Models\Audit;

class Store extends Controller
{
    public function __invoke(ValidateAudit $request, Audit $audit)
    {
        $audit->fill($request->validated())->save();

        return [
            'message' => __('The audit was successfully created'),
            'redirect' => 'system.audit.edit',
            'param' => ['audit' => $audit->id],
        ];
    }
}
