<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Actions\Auth;

use App\Base\Test\UnitCase;
use Mockery\MockInterface;
use WIP\Personal\Account\Helpers\Test\AccountSeedHelper;
use WIP\Personal\Account\Repositories\AccountRepository;
use WIP\Personal\Account\Services\Auth\AuthService;

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
