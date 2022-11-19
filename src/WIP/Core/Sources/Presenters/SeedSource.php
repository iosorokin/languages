<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Presenters;

use Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Sources\Presenters\Mixins\CreateSource;
use WIP\Core\Sources\Structures\Source;
use WIP\Personal\Account\Queries\GetUser;

final class SeedSource
{
    public function __construct(
        private CreateSource $createSource,
        private GetUser $getUser,
    ) {}

    public function __invoke(EloquentUserModel|int $user, LanguageModel|int $language, array $attributes): Source
    {
        $user = is_int($user) ? $this->getUser->getOrThrowException($user) : $user;
        $attributes['language_id'] = is_int($language) ? $language : $language->getId();
        $source = ($this->createSource)($user, $attributes);

        return $source;
    }
}
