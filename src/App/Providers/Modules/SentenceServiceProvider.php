<?php

declare(strict_types=1);

namespace App\Providers\Modules;

use App\Contracts\Presenters\Education\Sentence\CreateSentencePresenter;
use Illuminate\Support\ServiceProvider;
use Modules\Education\Sentences\Presenters\CreateSentence;

final class SentenceServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(CreateSentencePresenter::class, CreateSentence::class);
    }
}
