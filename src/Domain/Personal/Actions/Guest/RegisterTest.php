<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Guest;

use App\Base\Tests\UnitCase;
use Domain\Personal\Events\UserRegistered;
use Domain\Personal\Helpers\UserSeedHelper;
use Domain\Personal\Repositories\PersonalRepository;

final class RegisterTest extends UnitCase
{
    public function testRegisterUser()
    {
        $this->mock(PersonalRepository::class)->shouldReceive('add')->andReturn(1);
        $dto = UserSeedHelper::new()->registerDto();
        /** @var Register $register */
        $register = $this->app->make(Register::class);
        $register($dto);
        $events = $register->events();
        $this->assertArrayHasKey(UserRegistered::class, $events);
    }
}
