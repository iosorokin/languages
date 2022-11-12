<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Actions;

use App\Base\Tests\TestCase;
use WIP\Personal\Account\Helpers\Test\AccountSeedHelper;
use WIP\Personal\Account\Model\Aggregates\Account;
use WIP\Personal\Account\Repositories\AccountRepository;

final class SeedUserTest extends TestCase
{
    public function testSeedUser()
    {
        $this->mock(AccountRepository::class)
            ->shouldReceive('add')
            ->andReturn(1);
        $dto = AccountSeedHelper::new()->registerDto();
        /** @var SeedUser $register */
        $register = $this->app->make(SeedUser::class);
        $user = $register($dto);
        $this->assertInstanceOf(Account::class, $user);
    }
}
