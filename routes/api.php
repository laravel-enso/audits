<?php

use Illuminate\Support\Facades\Route;
use LaravelEnso\Audits\Http\Controllers\Audit\ExportExcel;
use LaravelEnso\Audits\Http\Controllers\Audit\InitTable;
use LaravelEnso\Audits\Http\Controllers\Audit\Options;
use LaravelEnso\Audits\Http\Controllers\Audit\TableData;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/system/audit')
    ->as('system.audit.')
    ->group(function () {
        Route::get('initTable', InitTable::class)->name('initTable');
        Route::get('tableData', TableData::class)->name('tableData');
        Route::get('exportExcel', ExportExcel::class)->name('exportExcel');
        Route::get('options', Options::class)->name('options');
    });
