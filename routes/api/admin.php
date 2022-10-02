<?php

use Illuminate\Support\Facades\Route;
use Modules\Languages\Controllers\Api\CreateLanguageController;

Route::post('languages', CreateLanguageController::class)
    ->name('languages.store');
