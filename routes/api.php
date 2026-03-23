<?php

use Illuminate\Support\Facades\Route;
use LaravelEnso\Audits\Http\Controllers\Audit\Create;
use LaravelEnso\Audits\Http\Controllers\Audit\Destroy;
use LaravelEnso\Audits\Http\Controllers\Audit\Edit;
use LaravelEnso\Audits\Http\Controllers\Audit\ExportExcel;
use LaravelEnso\Audits\Http\Controllers\Audit\Index;
use LaravelEnso\Audits\Http\Controllers\Audit\InitTable;
use LaravelEnso\Audits\Http\Controllers\Audit\Options;
use LaravelEnso\Audits\Http\Controllers\Audit\Store;
use LaravelEnso\Audits\Http\Controllers\Audit\TableData;
use LaravelEnso\Audits\Http\Controllers\Audit\Update;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/system/audit')
    ->as('system.audit.')
    ->group(function () {
        Route::get('', Index::class)->name('index');
        Route::get('create', Create::class)->name('create');
        Route::post('', Store::class)->name('store');
        Route::get('{audit}/edit', Edit::class)->name('edit');
        Route::patch('{audit}', Update::class)->name('update');
        Route::delete('{audit}', Destroy::class)->name('destroy');
        Route::get('initTable', InitTable::class)->name('initTable');
        Route::get('tableData', TableData::class)->name('tableData');
        Route::get('exportExcel', ExportExcel::class)->name('exportExcel');
        Route::get('options', Options::class)->name('options');
    });
