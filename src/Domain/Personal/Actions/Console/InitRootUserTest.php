<?php

declare(strict_types=1);

namespace Domain\Personal\Actions\Console;

use App\Base\Tests\UnitCase;
use App\Exceptions\DomainException;
use Domain\Personal\Helpers\UserSeedHelper;
use Domain\Personal\Repositories\PersonalRepository;
use Mockery\MockInterface;

final class InitRootUserTest extends UnitCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testInitRootUser()
    {
        $this->mock(PersonalRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('add')->andReturn(1);
            $mock->shouldReceive('hasRoot')->andReturnFalse();
        });
        $dto = UserSeedHelper::new()->registerDto();
        $initRootUser = app()->make(InitRootUser::class);
        $user = $initRootUser($dto);
        $this->assertTrue($user->accesses()->isRoot());
    }

    public function testCanNotInitRootUser()
    {
        $this->mock(PersonalRepository::class)->shouldReceive('hasRoot')->andReturnTrue();
        $this->expectException(DomainException::class);
        $dto = UserSeedHelper::new()->registerDto();
        $initRootUser = app()->make(InitRootUser::class);
        $initRootUser($dto);
    }
}
