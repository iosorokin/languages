<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Auth;

use App\Base\Tests\UnitCase;
use Domain\Personal\Helpers\UserSeedHelper;
use Domain\Personal\Repositories\PersonalRepository;
use Infrastructure\Services\Auth\AuthService;
use Mockery\MockInterface;

final class LogoutTest extends UnitCase
{
    public function testLogout()
    {
        $this->mock(PersonalRepository::class);
        $user = UserSeedHelper::new()->makeUser();
        $this->mock(AuthService::class, function (MockInterface $mock) use ($user) {
            $mock->shouldReceive('getAuth')
                ->andReturn($user);
            $mock->shouldReceive('logout')
                ->andReturnNull();
        });
        /** @var Logout $logout */
        $logout = $this->app->make(Logout::class);
        $this->assertNull($logout());
    }
}
