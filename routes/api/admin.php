<?php

use Illuminate\Support\Facades\Route;
use Modules\Domain\Languages\Application\Controllers\AdminLanguageController;

Route::apiResource('languages', AdminLanguageController::class)
    ->parameter('languages', 'language_id');
