<?php

use Illuminate\Support\Facades\Route;
use Modules\Domain\Languages\Controllers\Admin\AdminCreateLanguageController;
use Modules\Domain\Languages\Controllers\Admin\AdminUpdateLanguageController;

Route::post('languages', AdminCreateLanguageController::class)
    ->name('languages.store');
Route::put('languages/{language_id}', AdminUpdateLanguageController::class)
    ->name('languages.update');
