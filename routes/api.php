<?php

use App\Controllers\Api\Languages\ReaL\CreateRealLanguageController;
use App\Controllers\Api\Languages\ReaL\IndexRealLanguagesController;
use App\Controllers\Api\Personal\Auth\LearnerBaseLoginController;
use App\Controllers\Api\Personal\Learner\LernerRegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('learners', LernerRegistrationController::class)
    ->name('learners.create');

Route::post('login', LearnerBaseLoginController::class)
    ->name('learners.login');

Route::post('real_languages', CreateRealLanguageController::class)
    ->name('real_languages.create');
Route::get('real_languages', IndexRealLanguagesController::class)
    ->name('real_languages.index');
