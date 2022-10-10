<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters;

use Illuminate\Support\ServiceProvider;
use Modules\Domain\Chapters\Policies\ChapterPolicy;
use Modules\Domain\Chapters\Policies\LaravelChapterPolicy;
use Modules\Domain\Chapters\Presenters\GetChapter;
use Modules\Domain\Chapters\Presenters\GetChapterPresenter;
use Modules\Domain\Chapters\Presenters\ShowChapter;
use Modules\Domain\Chapters\Presenters\ShowChapterPresenter;
use Modules\Domain\Chapters\Presenters\UserStoreChapter;
use Modules\Domain\Chapters\Presenters\UserStoreChapterPresenter;

final class ChapterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(ChapterPolicy::class, LaravelChapterPolicy::class);
        $this->app->bind(UserStoreChapterPresenter::class, UserStoreChapter::class);
        $this->app->bind(ShowChapterPresenter::class, ShowChapter::class);
        $this->app->bind(GetChapterPresenter::class, GetChapter::class);
    }
}
