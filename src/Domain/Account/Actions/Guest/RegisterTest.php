<?php

declare(strict_types=1);

namespace Domain\Account\Actions\Guest;

use App\Base\Tests\UnitCase;
use App\Contracts\EventDispatcher;
use App\Contracts\FakeEventDispatcher;
use Domain\Account\Helpers\Test\AccountSeedHelper;
use Domain\Account\Model\Events\AccountCreated;
use Domain\Account\Repositories\AccountRepository;

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
