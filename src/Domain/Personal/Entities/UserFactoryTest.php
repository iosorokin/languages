<?php

declare(strict_types=1);

namespace Domain\Personal\Entities;

use App\Base\Tests\UnitCase;
use Domain\Personal\Helpers\UserSeedHelper;
use Domain\Personal\Repositories\PersonalRepository;

final class UserFactoryTest extends UnitCase
{
    private UserFactory $factory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mock(PersonalRepository::class);
        $this->factory = $this->app->make(UserFactory::class);
    }

    public function testRegisterUser()
    {
        $dto = UserSeedHelper::new()->registerDto();
        $user = $this->factory->register($dto);
        $this->assertTrue(true);
    }

    public function testRestoreUser()
    {
        $dto = UserSeedHelper::new()->restoreDto();
        $user = $this->factory->restore($dto);
        $this->assertTrue(true);
    }
}
