<?php

use Illuminate\Support\Facades\Route;
use Modules\Container\Controllers\User\UserPushElementToContainerController;
use Modules\Core\Sources\Controllers\StoreSourceController;
use Modules\Personal\Auth\Controllers\LogoutController;


Route::post('languages/{language_id}/sources', StoreSourceController::class)
    ->name('sources.create');

Route::post('containers', UserPushElementToContainerController::class)
    ->name('containers.create');

Route::post('logout', LogoutController::class)
    ->name('logout');

Route::post('containers/{id}/elements', UserPushElementToContainerController::class)
    ->name('containers.elements.store');
