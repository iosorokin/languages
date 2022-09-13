<?php

use Illuminate\Support\Facades\Route;
use Modules\Education\Source\Controllers\CreateSourceController;
use Modules\Languages\Learning\Controllers\Api\LearnRealLanguageController;
use Modules\Languages\Real\Controllers\Api\CreateRealLanguageController;
use Modules\Languages\Real\Controllers\Api\IndexRealLanguagesController;
use Modules\Languages\Real\Controllers\Api\ShowRealLanguageController;
use Modules\Personal\Auth\Controllers\Api\LearnerBaseLoginController;
use Modules\Personal\Learner\Controllers\Api\RegistrationLernerController;

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

Route::post('learners', RegistrationLernerController::class)
    ->name('learners.create');

Route::post('login', LearnerBaseLoginController::class)
    ->name('learners.login');

Route::post('real_languages', CreateRealLanguageController::class)
    ->name('real_languages.create');
Route::get('real_languages', IndexRealLanguagesController::class)
    ->name('real_languages.index');
Route::post('real_languages', CreateRealLanguageController::class)
    ->name('real_languages.create');
Route::get('real_languages/{id}', ShowRealLanguageController::class)
    ->name('real_languages.show');
Route::post('real_languages/{id}/learn', LearnRealLanguageController::class)
    ->name('real_languages.learn');

Route::post('sources', CreateSourceController::class)
    ->name('sources.create');
