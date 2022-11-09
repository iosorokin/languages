<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Actions\Auth;

use App\Base\Tests\UnitCase;
use Domain\Personal\Account\Helpers\Test\AccountSeedHelper;
use Domain\Personal\Account\Repositories\AccountRepository;
use Domain\Personal\Account\Services\Auth\AuthService;
use Mockery\MockInterface;

final class LogoutTest extends UnitCase
{
    public function testLogout()
    {
        $this->mock(AccountRepository::class);
        $account = AccountSeedHelper::new()->makeAccount();
        $this->mock(AuthService::class, function (MockInterface $mock) use ($account) {
            $mock->shouldReceive('getAuth')
                ->andReturn($account);
            $mock->shouldReceive('logout')
                ->andReturnNull();
        });
        /** @var Logout $logout */
        $logout = $this->app->make(Logout::class);
        $this->assertNull($logout());
    }
}
