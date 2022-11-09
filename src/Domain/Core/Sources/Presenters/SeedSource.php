<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Presenters;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Domain\Core\Sources\Presenters\Mixins\CreateSource;
use Domain\Core\Sources\Structures\Source;
use Domain\Personal\Account\Queries\GetUser;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

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
