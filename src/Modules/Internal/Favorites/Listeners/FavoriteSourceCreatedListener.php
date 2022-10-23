<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Sources\Events\SourceCreated;
use Modules\Domain\Sources\Presenters\Requests\IsFirstUserSourceForLanguagePresenter;
use Modules\Internal\Favorites\Presenters\AddToFavoritePresenter;
use Modules\Personal\User\Presenters\Internal\GetUserPresenter;

final class FavoriteSourceCreatedListener implements ShouldQueue
{
    public function __construct(
        private GetUserPresenter                      $getUser,
        private GetLanguagePresenter                  $getLanguage,
        private IsFirstUserSourceForLanguagePresenter $isFirstUserSourceForLanguage,
        private AddToFavoritePresenter                $addToFavorite,
    ) {}

    public function __invoke(SourceCreated $event): void
    {
        $isFirstSource = ($this->isFirstUserSourceForLanguage)($event->userId, $event->languageId);

        if ($isFirstSource) {
            $user = $this->getUser->getOrThrowException($event->userId);
            $language = $this->getLanguage->getOrThrowException($event->languageId);
            ($this->addToFavorite)($user, $language);
        }
    }
}
