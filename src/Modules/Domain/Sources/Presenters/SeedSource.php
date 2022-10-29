<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters;

use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;
use Modules\Domain\Sources\Presenters\Mixins\CreateSource;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\App\Presenters\Personal\Internal\GetUser;
use Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel;

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
