<?php

use App\Controll\Controllers\Auth\LogoutController;
use App\Controll\Controllers\Language\UserFavoriteLanguageController;
use App\Controll\Controllers\Language\UserLanguageController;
use Illuminate\Support\Facades\Route;
use WIP\Core\Analysis\Controllers\UserStoreAnalysisController;
use WIP\Core\Chapters\Controllers\UserChapterController;
use WIP\Core\Sentences\Controllers\UserSentenceController;
use WIP\Core\Sources\Controllers\Items\UserSourceItemsController;
use WIP\Core\Sources\Controllers\UserSourceController;

//Route::apiResource('languages', UserLanguageController::class)
//    ->parameter('languages', 'language_id');
//Route::apiResource('languages.favorites', UserFavoriteLanguageController::class)
//    ->parameters([
//        'languages' => 'language_id',
//        'favorites' => 'favorite_id',
//    ])
//    ->only(['store', 'destroy']);
//
//Route::apiResource('sources', UserSourceController::class);
//Route::apiResource('sources.items', UserSourceItemsController::class)
//    ->only(['index']);
//
//Route::apiResource('sources.chapters', UserChapterController::class)
//    ->only('store');
//Route::apiResource('chapters', UserChapterController::class)
//    ->except(['store']);
//
//Route::apiResource('sentences', UserSentenceController::class);
//
//Route::post('sentences/{sentence_id}/analysis', UserStoreAnalysisController::class)
//    ->name('analysis.store');
//
//Route::post('logout', LogoutController::class)
//    ->name('logout');
