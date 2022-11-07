<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Application\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Domain\Core\Languages\Application\Presenters\Internal\GetLanguage;
use Domain\Core\Languages\Domain\Policies\LanguagePolicy;
use Domain\Internal\Favorites\Model\Favorite;
use Domain\Internal\Favorites\Presenters\AddToFavorite;
use Domain\Internal\Favorites\Presenters\AddToFavoritePresenter;

final class UserAddLanguageToFavorite
{
    public function __construct(
        private GetAuthUser            $getAuthUser,
        private LanguagePolicy         $policy,
        private GetLanguage   $getLanguage,
        private AddToFavorite $addToFavorite,
    ) {}

    public function __invoke(int $languageId): Favorite
    {
        $auth = ($this->getAuthUser)();
        $language = $this->getLanguage->getOrThrowBadRequest($languageId);
        $this->policy->canTakeToLearn($language);
        $favorite = ($this->addToFavorite)($auth, $language);

        return $favorite;
    }
}
