<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/import', [EmployeeController::class, 'import'])->name('import');
Route::get('/exportCsv', [EmployeeController::class, 'exportCsv'])->name('exportCsv');
Route::get('/exportXls', [EmployeeController::class, 'exportXls'])->name('exportXls');