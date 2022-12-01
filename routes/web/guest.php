<?php

use Illuminate\Support\Facades\Route;
use Presentation\View\Web\IndexView;

Route::get('/', IndexView::class)
    ->name('index');
