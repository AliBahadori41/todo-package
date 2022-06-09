<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'api',
    'namespace' => 'Alibahadori\Todo\Http\Controllers',
    'middleware' => ['auth:sanctum', 'bindings']
], function () {
    Route::put('/tasks/{task}/update-status', 'TasksController@updateStatus');
    Route::post('/tasks/{task}/add-labels', 'TasksController@addLabels');
    Route::resource('/tasks', 'TasksController')->only(['index','store','show','update']);
    Route::resource('/labels', 'LabelsController')->only(['store', 'index']);
});
