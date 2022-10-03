<?php

declare(strict_types=1);

namespace Modules\Container\Presenters\User;

use Modules\Container\Actions\CreateContainer;
use Modules\Container\Entites\Container;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserPushElement implements UserPushElementPresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private CreateContainer $createContainer,
    ) {}

    public function __invoke(array $attributes): Container
    {
        $client = ($this->getClient)();


        return $container;
    }
}
