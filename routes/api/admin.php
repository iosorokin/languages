<?php

use Illuminate\Support\Facades\Route;
use Domain\Languages\Application\Controllers\AdminLanguageController;

Route::apiResource('languages', AdminLanguageController::class)
    ->parameter('languages', 'language_id');
