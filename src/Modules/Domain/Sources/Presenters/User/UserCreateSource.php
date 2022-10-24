<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\User;

use Modules\Domain\Sources\Presenters\Mixins\CreateSource;
use Modules\Domain\Sources\Structures\Source;
use Modules\Personal\Auth\Presenters\Internal\GetAuthUser;

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
