<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Listeners;

use Dflydev\DotAccessData\Data;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Sources\Repositories\SourceRepository;
use Modules\Internal\Container\Events\SourceCreated;
use Modules\Internal\Favorites\Presenters\AddToFavoritePresenter;
use Modules\Personal\User\Presenters\Internal\GetUserPresenter;

final class FavoriteSourceCreatedListener implements ShouldQueue
{
    public function __construct(
        private GetUserPresenter $getUser,
        private GetLanguagePresenter $getLanguage,
        private SourceRepository $sourceRepository,
        private AddToFavoritePresenter $addToFavorite,
    ) {}

    public function __invoke(SourceCreated $event): void
    {
        $isFirstSource = $this->sourceRepository->ifUserFirstSourcesByLanguage($event->userId, $event->languageId);

        if ($isFirstSource) {
            $user = $this->getUser->getOrThrowException($event->userId);
            $language = $this->getLanguage->getOrThrowException($event->languageId);
            ($this->addToFavorite)($user, $language);
        }
    }
}
