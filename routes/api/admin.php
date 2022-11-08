<?php

use App\Controllers\Language\AdminLanguageController;
use Illuminate\Support\Facades\Route;

Route::apiResource('languages', AdminLanguageController::class)
    ->parameter('languages', 'language_id');
