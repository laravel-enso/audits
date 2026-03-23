<?php

namespace LaravelEnso\Audits\Http\Controllers\Audit;

use Illuminate\Routing\Controller;
use LaravelEnso\Audits\Tables\Builders\Audit;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = Audit::class;
}
