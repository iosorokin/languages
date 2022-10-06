<?php

declare(strict_types=1);

namespace Modules\Core\Sentences;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Sentences\Factories\ModelSentenceFactory;
use Modules\Core\Sentences\Factories\SentenceFactory;
use Modules\Core\Sentences\Policies\LaravelSentencePolicy;
use Modules\Core\Sentences\Policies\SentencePolicy;
use Modules\Core\Sentences\Presenters\User\UserCreateSentence;
use Modules\Core\Sentences\Presenters\User\UserCreateSentencePresenter;
use Modules\Core\Sentences\Repositories\EloquentSentenceRepository;
use Modules\Core\Sentences\Repositories\SentenceRepository;

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
