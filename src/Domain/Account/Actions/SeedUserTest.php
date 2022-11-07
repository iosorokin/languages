<?php

declare(strict_types=1);

namespace Domain\Account\Actions;

use App\Base\Tests\TestCase;
use Domain\Account\Helpers\Test\AccountSeedHelper;
use Domain\Account\Model\Aggregates\Account;
use Domain\Account\Repositories\AccountRepository;

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
