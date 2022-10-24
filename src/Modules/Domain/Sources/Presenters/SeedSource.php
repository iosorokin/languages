<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters;

use Modules\Domain\Languages\Model\Language;
use Modules\Domain\Sources\Presenters\Mixins\CreateSource;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\User\Presenters\Internal\GetUser;
use Modules\Personal\User\Model\User;

final class SeedSource
{
    public function __construct(
        private CreateSource $createSource,
        private GetUser $getUser,
    ) {}

    public function __invoke(User|int $user, Language|int $language, array $attributes): Source
    {
        $user = is_int($user) ? $this->getUser->getOrThrowException($user) : $user;
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();
        $source = ($this->createSource)($user, $attributes);

        return $source;
    }
}
