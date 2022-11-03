<?php

declare(strict_types=1);

namespace Domain\Personal\Actions;

use App\Base\Tests\TestCase;
use Domain\Personal\Entities\User;
use Domain\Personal\Helpers\UserSeedHelper;
use Domain\Personal\Repositories\PersonalRepository;

final class SeedUserTest extends TestCase
{
    public function testSeedUser()
    {
        $this->mock(PersonalRepository::class)
            ->shouldReceive('add')
            ->andReturn(1);
        $dto = UserSeedHelper::new()->registerDto();
        /** @var SeedUser $register */
        $register = $this->app->make(SeedUser::class);
        $user = $register($dto);
        $this->assertInstanceOf(User::class, $user);
    }
}
