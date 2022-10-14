<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\User;

use Modules\Domain\Languages\Policies\LanguagePolicy;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Internal\Favorites\Presenters\AddToFavoritePresenter;
use Modules\Internal\Favorites\Structures\Favorite;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserAddLanguageToFavorite implements UserAddLanguageToFavoritePresenter
{
    public function __construct(
        private GetClientPresenter     $getClient,
        private LanguagePolicy         $policy,
        private GetLanguagePresenter   $getLanguage,
        private AddToFavoritePresenter $addToFavorite,
    ) {}

    public function __invoke(int $languageId): Favorite
    {
        $client = ($this->getClient)();
        $language = $this->getLanguage->getOrThrowBadRequest($languageId);
        $this->policy->canTakeToLearn($client, $language);
        $favorite = ($this->addToFavorite)($client->user(), $language);

        return $favorite;
    }
}
