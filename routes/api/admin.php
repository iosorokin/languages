<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Languages\Application\Controllers\AdminLanguageController;

Route::apiResource('languages', AdminLanguageController::class)
    ->parameter('languages', 'language_id');
