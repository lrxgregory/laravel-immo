<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\HomeController;

$idRegex = '[0-9]+';
$slugRegex = '[a-z0-9\-]+';

Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes pour le front
Route::get('/properties', [App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
Route::get('/properties/{slug}-{property}', [App\Http\Controllers\PropertyController::class, 'show'])
    ->name('property.show')
    ->where([
        'property' => $idRegex, // Limitation sur l'ID numérique
        'slug' => $slugRegex, // Limitation sur le slug
    ]);

Route::post('/properties/{property}/contact', [App\Http\Controllers\PropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex
]);

Route::get('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'doLogin']);
Route::delete('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    // Important : la route de suppression d'image DOIT être AVANT la resource route
    Route::delete('property/{property}/image/{image}', [App\Http\Controllers\Admin\PropertyController::class, 'deleteImage'])
        ->name('property.image.delete')
        ->where([
            'property' => '[0-9]+',
            'image' => '[0-9]+'
        ]);

    // Routes resource après
    Route::resource('property', App\Http\Controllers\Admin\PropertyController::class)->except('show');
    Route::resource('option', OptionController::class)->except('show');
});

Route::get('/api/property', [App\Http\Controllers\Api\PropertyController::class, 'index'])->name('api.property.index');
