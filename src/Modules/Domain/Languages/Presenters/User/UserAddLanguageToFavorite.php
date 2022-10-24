<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\User;

use Modules\Domain\Languages\Policies\LanguagePolicy;
use Modules\Domain\Languages\Presenters\Internal\GetLanguage;
use Modules\Internal\Favorites\Presenters\AddToFavorite;
use Modules\Internal\Favorites\Presenters\AddToFavoritePresenter;
use Modules\Internal\Favorites\Model\Favorite;
use Modules\Personal\Auth\Presenters\Internal\GetAuthUser;

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
