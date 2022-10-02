<?php

use Illuminate\Support\Facades\Route;
use Modules\Container\Controllers\CreateContainerController;
use Modules\Education\Dictionary\Controller\StoreDictionaryController;
use Modules\Education\Rules\Controllers\StoreRuleController;
use Modules\Education\Source\Controllers\StoreSourceController;
use Modules\Personal\Auth\Controllers\LogoutController;


Route::post('sources', StoreSourceController::class)
    ->name('sources.create');

Route::post('rules', StoreRuleController::class)
    ->name('rules.store');

Route::post('containers', CreateContainerController::class)
    ->name('containers.create');

Route::post('logout', LogoutController::class)
    ->name('logout');

Route::post('dictionaries', StoreDictionaryController::class)
    ->name('dictionaries.store');
