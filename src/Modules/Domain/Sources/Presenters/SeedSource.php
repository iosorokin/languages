<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters;

use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Sources\Presenters\Mixins\CreateSource;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Presenters\GetClientPresenter;
use Modules\Personal\User\Presenters\Internal\GetUserPresenter;
use Modules\Personal\User\Repositories\UserRepository;
use Modules\Personal\User\Structures\User;

final class SeedSource
{
    public function __construct(
        private GetClientPresenter $getClient,
        private CreateSource $createSource,
        private GetUserPresenter $getUser,
    ) {}

    public function __invoke(User|int $user, Language|int $language, array $attributes): Source
    {
        $user = is_int($user) ? $this->getUser->getOrThrowException($user) : $user;
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();
        $client = ($this->getClient)($user);
        $source = ($this->createSource)($client, $attributes);

        return $source;
    }
}
