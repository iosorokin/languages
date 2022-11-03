<?php

declare(strict_types=1);

namespace Domain\Personal\Aggregates;

use App\Base\Tests\UnitCase;
use App\Exceptions\DomainException;
use Domain\Personal\Helpers\UserSeedHelper;
use Domain\Personal\Policies\CanAssignAsRoot;
use Domain\Personal\Repositories\PersonalRepository;

final class RootTest extends UnitCase
{
    public function testConfirmRoot()
    {
        $this->mock(PersonalRepository::class)
            ->shouldReceive('hasRoot')
            ->andReturnFalse();
        $user = UserSeedHelper::new()->makeUser();
        $root = new Root($user);
        $root->confirm(app(CanAssignAsRoot::class));
        $this->assertTrue($user->accesses()->isRoot());
    }

    public function testCanNotConfirmRoot()
    {
        $this->expectException(DomainException::class);
        $this->mock(PersonalRepository::class)
            ->shouldReceive('hasRoot')
            ->andReturnTrue();
        $user = UserSeedHelper::new()->makeUser();
        $root = new Root($user);
        $root->confirm(app(CanAssignAsRoot::class));
        $this->assertTrue($user->accesses()->isRoot());
    }
}
