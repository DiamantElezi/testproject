<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\EmployeeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('employee')->group(function () {
    Route::post('/import-csv', [EmployeeController::class, 'importCsv']);
    Route::get('/', [EmployeeController::class, 'getAllEmployees']);
    Route::post('/{id}', [EmployeeController::class, 'getEmployee']);
    Route::delete('/{id}', [EmployeeController::class, 'deleteEmploy']);
});
