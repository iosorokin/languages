<?php

use Illuminate\Support\Facades\Route;
use Modules\Domain\Analysis\Controllers\UserStoreAnalysisController;
use Modules\Domain\Chapters\Controllers\UserStoreChapterController;
use Modules\Domain\Languages\Controllers\UserFavoriteLanguageController;
use Modules\Domain\Languages\Controllers\UserLanguageController;
use Modules\Domain\Sentences\Controllers\StoreSentenceController;
use Modules\Domain\Sentences\Controllers\UserDeleteSentenceController;
use Modules\Domain\Sources\Controllers\StoreSourceController;
use Modules\Personal\Auth\Controllers\LogoutController;

Route::apiResource('languages', UserLanguageController::class)
    ->parameter('languages', 'language_id');
Route::apiResource('languages.favorites', UserFavoriteLanguageController::class)
    ->parameters([
        'languages' => 'language_id',
        'favorites' => 'favorite_id',
    ])
    ->only(['store', 'destroy']);

Route::post('languages/{language_id}/sources', StoreSourceController::class)
    ->name('sources.store');
Route::post('sources/{source_id}/chapters', UserStoreChapterController::class)
    ->name('chapters.store');
Route::post('sources/{source_id}/sentences', StoreSentenceController::class)
    ->name('sentences.store');
Route::delete('sentences/{sentence_id}', UserDeleteSentenceController::class);

Route::post('sentences/{sentence_id}/analysis', UserStoreAnalysisController::class)
    ->name('analysis.store');

Route::post('logout', LogoutController::class)
    ->name('logout');
