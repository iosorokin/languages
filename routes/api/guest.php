<?php

use Illuminate\Support\Facades\Route;
use Modules\Education\Source\Controllers\ShowSourceController;
use Modules\Languages\Controllers\Api\IndexLanguagesController;
use Modules\Languages\Controllers\Api\ShowLanguageController;
use Modules\Personal\Auth\Controllers\BaseLoginController;
use Modules\Personal\User\Controllers\Guest\RegistrationController;
use Modules\Personal\User\Controllers\Guest\ShowUserController;

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

Route::post('login', BaseLoginController::class)
    ->name('login');

Route::post('users', RegistrationController::class)
    ->name('users.store');
Route::get('users/{id}', ShowUserController::class)
    ->name('users.show');

Route::get('languages', IndexLanguagesController::class)
    ->name('languages.index');
Route::get('languages/{id}', ShowLanguageController::class)
    ->name('languages.show');

Route::get('sources/{source_id}', ShowSourceController::class)
    ->name('sources.show');
