<?php

use Illuminate\Support\Facades\Route;
use Modules\Domain\Analysis\Controllers\UserStoreAnalysisController;
use Modules\Domain\Chapters\Controllers\UserChapterController;
use Modules\Domain\Languages\Controllers\UserFavoriteLanguageController;
use Modules\Domain\Languages\Controllers\UserLanguageController;
use Modules\Domain\Sentences\Controllers\UserSentenceController;
use Modules\Domain\Sources\Controllers\Items\UserSourceItemsController;
use Modules\Domain\Sources\Controllers\UserSourceController;
use Modules\Personal\App\Controllers\Auth\LogoutController;

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
