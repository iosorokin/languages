<?php

declare(strict_types=1);

namespace Modules\Education\Sentences;

use Illuminate\Support\ServiceProvider;
use Modules\Education\Sentences\Policies\LaravelSentencePolicy;
use Modules\Education\Sentences\Policies\SentencePolicy;
use Modules\Education\Sentences\Presenters\User\UserCreateSentence;
use Modules\Education\Sentences\Presenters\User\UserCreateSentencePresenter;
use Modules\Education\Sentences\Repositories\EloquentSentenceRepository;
use Modules\Education\Sentences\Repositories\SentenceRepository;

final class SentenceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(UserCreateSentencePresenter::class, UserCreateSentence::class);
        $this->app->bind(SentenceRepository::class, EloquentSentenceRepository::class);
        $this->app->bind(SentencePolicy::class, LaravelSentencePolicy::class);
    }
}
