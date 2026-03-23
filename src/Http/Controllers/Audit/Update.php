<?php

namespace LaravelEnso\Audits\Http\Controllers\Audit;

use Illuminate\Routing\Controller;
use LaravelEnso\Audits\Http\Requests\ValidateAudit;
use LaravelEnso\Audits\Models\Audit;

class Update extends Controller
{
    public function __invoke(ValidateAudit $request, Audit $audit)
    {
        $audit->update($request->validated());

        return ['message' => __('The audit was successfully updated')];
    }
}
