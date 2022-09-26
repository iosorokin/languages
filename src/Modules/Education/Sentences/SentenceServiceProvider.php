<?php

declare(strict_types=1);

namespace Modules\Education\Sentences;

use Illuminate\Support\ServiceProvider;
use Modules\Education\Sentences\Presenters\CreateSentence;
use Modules\Education\Sentences\Presenters\CreateSentencePresenter;
use Modules\Education\Sentences\Repositories\EloquentSentenceRepository;
use Modules\Education\Sentences\Repositories\SentenceRepository;

final class SentenceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(CreateSentencePresenter::class, CreateSentence::class);
        $this->app->bind(SentenceRepository::class, EloquentSentenceRepository::class);
    }
}
