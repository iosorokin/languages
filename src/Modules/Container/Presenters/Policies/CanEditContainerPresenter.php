<?php

declare(strict_types=1);

namespace Modules\Container\Presenters\Policies;

use Illuminate\Auth\Access\AuthorizationException;
use Modules\Container\Structures\ContainerStructure;
use Modules\Personal\User\Contracts\Userable;

interface CanEditContainerPresenter
{
    /**
     * @throws AuthorizationException
     */
    public function __invoke(Userable $userable, ContainerStructure|int $container): ContainerStructure;
}
