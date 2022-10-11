<?php

use Illuminate\Support\Facades\Route;
use Modules\Domain\Languages\Controllers\Admin\AdminCreateLanguageController;

Route::post('languages', AdminCreateLanguageController::class)
    ->name('languages.store');
