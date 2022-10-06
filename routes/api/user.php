<?php

use Illuminate\Support\Facades\Route;
use Modules\Container\Controllers\User\UserPushElementToContainerController;
use Modules\Education\Dictionary\Controllers\StoreDictionaryController;
use Modules\Education\Rules\Controllers\StoreRuleController;
use Modules\Education\Source\Controllers\StoreSourceController;
use Modules\Personal\Auth\Controllers\LogoutController;


Route::post('languages/{language_id}/sources', StoreSourceController::class)
    ->name('sources.create');

Route::post('rules', StoreRuleController::class)
    ->name('rules.store');

Route::post('containers', UserPushElementToContainerController::class)
    ->name('containers.create');

Route::post('logout', LogoutController::class)
    ->name('logout');

Route::post('dictionaries', StoreDictionaryController::class)
    ->name('dictionaries.store');

Route::post('containers/{id}/elements', UserPushElementToContainerController::class)
    ->name('containers.elements.store');
