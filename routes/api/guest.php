<?php

use App\Controllers\Auth\BaseLoginController;
use App\Controllers\Personal\RegisterController;
use Illuminate\Support\Facades\Route;
use Domain\Languages\Application\Controllers\GuestLanguageController;
use Domain\Sources\Controllers\GuestSourceController;
use Domain\Sources\Controllers\Items\GuestSourceItemsController;

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

Route::apiResource('users', RegisterController::class)
    ->only(['store', 'show']);

Route::apiResource('languages', GuestLanguageController::class)
    ->parameter('languages', 'language_id');

Route::apiResource('sources', GuestSourceController::class)
    ->only(['show', 'index']);
Route::apiResource('sources.items', GuestSourceItemsController::class)
    ->only(['index']);
