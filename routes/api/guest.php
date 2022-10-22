<?php

use Illuminate\Support\Facades\Route;
use Modules\Domain\Chapters\Controllers\UserShowChapterController;
use Modules\Domain\Languages\Controllers\GuestLanguageController;
use Modules\Domain\Sources\Controllers\GuestSourceController;
use Modules\Domain\Sources\Controllers\Items\GuestSourceItemsController;
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
Route::get('users/{user_id}', ShowUserController::class)
    ->name('users.show');

Route::apiResource('languages', GuestLanguageController::class)
    ->parameter('languages', 'language_id');

Route::apiResource('sources', GuestSourceController::class)
    ->only(['show', 'index']);
Route::apiResource('sources.items', GuestSourceItemsController::class)
    ->only(['index']);

Route::get('chapters/{chapter_id}', UserShowChapterController::class)
    ->name('chapters.show');
