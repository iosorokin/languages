<?php

use Illuminate\Support\Facades\Route;
use Modules\Container\Controllers\CreateContainerController;
use Modules\Education\Dictionary\Controller\StoreDictionaryController;
use Modules\Languages\Learning\Controllers\LearnRealLanguageController;
use Modules\Languages\Real\Controllers\Api\CreateRealLanguageController;
use Modules\Languages\Real\Controllers\Api\IndexRealLanguagesController;
use Modules\Languages\Real\Controllers\Api\ShowRealLanguageController;
use Modules\Personal\Auth\Controllers\LearnerBaseLoginController;
use Modules\Personal\Auth\Controllers\LearnerLogoutController;
use Modules\Personal\Learner\Controllers\RegistrationLernerController;
use Modules\Personal\Learner\Controllers\ShowLearnerController;

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
    ->name('learners.store');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('learners', ShowLearnerController::class)
        ->name('learners.show');

    Route::post('logout', LearnerLogoutController::class)
        ->name('learners.logout');

    Route::post('dictionaries', StoreDictionaryController::class)
        ->name('dictionaries.store');
});

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

Route::post('containers', CreateContainerController::class)
    ->name('containers.create');

