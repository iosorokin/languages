<?php

use Illuminate\Support\Facades\Route;
use Modules\Domain\Chapters\Controllers\UserStoreChapterController;
use Modules\Domain\Sentences\Controllers\UserDeleteSentenceController;
use Modules\Domain\Sentences\Controllers\StoreSentenceController;
use Modules\Domain\Sources\Controllers\StoreSourceController;
use Modules\Favorites\Controllers\UserAddFavoriteController;
use Modules\Favorites\Controllers\UserRemoveFavoriteController;
use Modules\Personal\Auth\Controllers\LogoutController;

Route::post('languages/{language_id}/sources', StoreSourceController::class)
    ->name('sources.store');
Route::post('sources/{source_id}/chapters', UserStoreChapterController::class)
    ->name('chapters.store');
Route::post('sources/{source_id}/sentences', StoreSentenceController::class)
    ->name('sentences.store');
Route::delete('sentences/{sentence_id}', UserDeleteSentenceController::class);

Route::post('logout', LogoutController::class)
    ->name('logout');

Route::post('favorites/add', UserAddFavoriteController::class)
    ->name('favorites.add');
Route::post('favorites/remove', UserRemoveFavoriteController::class)
    ->name('favorites.remove');
