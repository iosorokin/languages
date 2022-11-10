<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Commands\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Domain\Core\Languages\Model\Manager\Aggregates\Student\Policies\CanTakeToLearn;
use Domain\Core\Languages\Model\Manager\Queries\Mixins\GetLanguage;
use Domain\Internal\Favorites\Model\Favorite;
use Domain\Internal\Favorites\Presenters\AddToFavorite;
use Domain\Internal\Favorites\Presenters\AddToFavoritePresenter;

final class UserAddLanguageToFavorite
{
    public function __construct(
        private GetAuthUser    $getAuthUser,
        private CanTakeToLearn $policy,
        private GetLanguage    $getLanguage,
        private AddToFavorite  $addToFavorite,
    ) {}

    public function __invoke(int $languageId): Favorite
    {
        $auth = ($this->getAuthUser)();
        $language = $this->getLanguage->getOrThrowBadRequest($languageId);
        $this->policy->__invoke($language);
        $favorite = ($this->addToFavorite)($auth, $language);

        return $favorite;
    }
}
