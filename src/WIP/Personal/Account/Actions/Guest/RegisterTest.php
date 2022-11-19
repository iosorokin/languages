<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Actions\Guest;

use App\Base\Event\EventDispatcher;
use App\Base\Event\FakeEventDispatcher;
use App\Base\Test\UnitCase;
use WIP\Personal\Account\Helpers\Test\AccountSeedHelper;
use WIP\Personal\Account\Model\Events\AccountCreated;
use WIP\Personal\Account\Repositories\AccountRepository;

final class RegisterTest extends UnitCase
{
    public function testRegisterUser()
    {
        $dispatcher = new FakeEventDispatcher();
        $this->mock(AccountRepository::class)->shouldReceive('add')->andReturn(1);
        $this->app->bind(EventDispatcher::class, function () use ($dispatcher) {
            return $dispatcher;
        });
        $dto = AccountSeedHelper::new()->registerDto();
        /** @var Register $register */
        $register = $this->app->make(Register::class);
        $register($dto);
        $this->assertTrue($dispatcher->hasEvent(AccountCreated::class));
    }
}
