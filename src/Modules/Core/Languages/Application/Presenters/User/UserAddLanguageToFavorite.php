<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Modules\Core\Languages\Application\Presenters\Internal\GetLanguage;
use Modules\Core\Languages\Domain\Policies\LanguagePolicy;
use Modules\Internal\Favorites\Model\Favorite;
use Modules\Internal\Favorites\Presenters\AddToFavorite;
use Modules\Internal\Favorites\Presenters\AddToFavoritePresenter;

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
