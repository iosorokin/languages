<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Presenters\User;

use Domain\Controllers\Auth\Internal\GetAuthUser;
use WIP\Core\Sources\Presenters\Mixins\CreateSource;
use WIP\Core\Sources\Structures\Source;

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
