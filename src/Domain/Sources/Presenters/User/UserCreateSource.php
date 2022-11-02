<?php

declare(strict_types=1);

namespace Domain\Sources\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Domain\Sources\Presenters\Mixins\CreateSource;
use Domain\Sources\Structures\Source;

final class UserCreateSource
{
    public function __construct(
        private GetAuthUser $getAuthUser,
        private CreateSource $createSource,
    ) {}

    /**
     * @param array<mixed> $attributes
     */
    public function __invoke(array $attributes): Source
    {
        $user = ($this->getAuthUser)();
        $source = ($this->createSource)($user, $attributes);

        return $source;
    }
}
