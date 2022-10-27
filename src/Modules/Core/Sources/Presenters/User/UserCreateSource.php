<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Presenters\User;

use App\Controllers\Auth\Internal\GetAuthUser;
use Modules\Core\Sources\Presenters\Mixins\CreateSource;
use Modules\Core\Sources\Structures\Source;

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
