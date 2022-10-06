<?php

use Illuminate\Support\Facades\Route;
use Modules\Domain\Languages\Controllers\CreateLanguageController;

Route::post('languages', CreateLanguageController::class)
    ->name('languages.store');
