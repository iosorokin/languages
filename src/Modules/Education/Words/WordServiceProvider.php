<?php

declare(strict_types=1);

namespace Modules\Education\Words;

use Illuminate\Support\ServiceProvider;
use Modules\Education\Words\Presenters\CreateWordPresenter;
use Modules\Education\Words\Presenters\GetOrCreateWord;
use Modules\Education\Words\Repositories\EloquentWordRepository;
use Modules\Education\Words\Repositories\WordRepository;

final class WordServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(CreateWordPresenter::class, GetOrCreateWord::class);
        $this->app->bind(WordRepository::class, EloquentWordRepository::class);
    }
}
