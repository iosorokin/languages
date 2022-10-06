<?php

declare(strict_types=1);

namespace Modules\Domain\Sentences;

use Illuminate\Support\ServiceProvider;
use Modules\Domain\Sentences\Factories\ModelSentenceFactory;
use Modules\Domain\Sentences\Factories\SentenceFactory;
use Modules\Domain\Sentences\Policies\LaravelSentencePolicy;
use Modules\Domain\Sentences\Policies\SentencePolicy;
use Modules\Domain\Sentences\Presenters\User\UserCreateSentence;
use Modules\Domain\Sentences\Presenters\User\UserCreateSentencePresenter;
use Modules\Domain\Sentences\Repositories\EloquentSentenceRepository;
use Modules\Domain\Sentences\Repositories\SentenceRepository;

final class SentenceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(UserCreateSentencePresenter::class, UserCreateSentence::class);
        $this->app->bind(SentenceRepository::class, EloquentSentenceRepository::class);
        $this->app->bind(SentencePolicy::class, LaravelSentencePolicy::class);
        $this->app->bind(SentenceFactory::class, ModelSentenceFactory::class);
    }
}
