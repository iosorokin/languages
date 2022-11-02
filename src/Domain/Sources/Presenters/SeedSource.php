<?php

declare(strict_types=1);

namespace Domain\Sources\Presenters;

use Domain\Personal\Actions\Common\GetUser;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Domain\Sources\Presenters\Mixins\CreateSource;
use Domain\Sources\Structures\Source;

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
