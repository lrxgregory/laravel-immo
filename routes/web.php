<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PropertyController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('property', PropertyController::class)->except('show');
});
