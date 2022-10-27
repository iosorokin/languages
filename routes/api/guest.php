<?php

use Illuminate\Support\Facades\Route;
use Modules\Core\Languages\Application\Controllers\GuestLanguageController;
use Modules\Core\Sources\Controllers\GuestSourceController;
use Modules\Core\Sources\Controllers\Items\GuestSourceItemsController;
use Modules\Personal\App\Controllers\Auth\BaseLoginController;
use Modules\Personal\App\Controllers\Personal\RegisterController;

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
