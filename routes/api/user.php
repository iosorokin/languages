<?php

use App\Controllers\Auth\LogoutController;
use Domain\Core\Analysis\Controllers\UserStoreAnalysisController;
use Domain\Core\Chapters\Controllers\UserChapterController;
use Domain\Core\Languages\Application\Controllers\UserFavoriteLanguageController;
use Domain\Core\Languages\Application\Controllers\UserLanguageController;
use Domain\Core\Sentences\Controllers\UserSentenceController;
use Domain\Core\Sources\Controllers\Items\UserSourceItemsController;
use Domain\Core\Sources\Controllers\UserSourceController;
use Illuminate\Support\Facades\Route;

Route::apiResource('languages', UserLanguageController::class)
    ->parameter('languages', 'language_id');
Route::apiResource('languages.favorites', UserFavoriteLanguageController::class)
    ->parameters([
        'languages' => 'language_id',
        'favorites' => 'favorite_id',
    ])
    ->only(['store', 'destroy']);

Route::apiResource('sources', UserSourceController::class);
Route::apiResource('sources.items', UserSourceItemsController::class)
    ->only(['index']);

Route::apiResource('sources.chapters', UserChapterController::class)
    ->only('store');
Route::apiResource('chapters', UserChapterController::class)
    ->except(['store']);

Route::apiResource('sentences', UserSentenceController::class);

Route::post('sentences/{sentence_id}/analysis', UserStoreAnalysisController::class)
    ->name('analysis.store');

Route::post('logout', LogoutController::class)
    ->name('logout');
