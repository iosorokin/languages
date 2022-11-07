<?php

use Domain\Core\Languages\Application\Controllers\AdminLanguageController;
use Illuminate\Support\Facades\Route;

Route::apiResource('languages', AdminLanguageController::class)
    ->parameter('languages', 'language_id');
