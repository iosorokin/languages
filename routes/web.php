<?php

use Illuminate\Support\Facades\Route;
use Modules\Languages\Learning\Controllers\Web\LearnRealLanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('real_languages/{id}/learn', LearnRealLanguageController::class)
    ->name('real_languages.learn');
