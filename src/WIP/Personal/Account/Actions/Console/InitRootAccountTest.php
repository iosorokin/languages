<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Actions\Console;

use Core\Base\Event\EventDispatcher;
use Core\Base\Test\UnitCase;
use App\Exceptions\DomainException;
use Mockery\MockInterface;
use WIP\Personal\Account\Helpers\Test\AccountSeedHelper;
use WIP\Personal\Account\Repositories\AccountRepository;

final class InitRootAccountTest extends UnitCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->mock(EventDispatcher::class)
            ->shouldReceive('dispatch', 'dispatchAll')
            ->andReturnNull();
    }

    public function testInitRootUser()
    {
        $this->mock(AccountRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('add')->andReturn(1);
            $mock->shouldReceive('hasRoot')->andReturnFalse();
        });
        $dto = AccountSeedHelper::new()->registerDto();
        /** @var InitRootAccount $initRootAccount */
        $initRootAccount = app()->make(InitRootAccount::class);
        $account = $initRootAccount($dto);
        $this->assertTrue($account->isRoot());
    }

    public function testCanNotInitRootUser()
    {
        $this->mock(AccountRepository::class)->shouldReceive('hasRoot')->andReturnTrue();
        $this->expectException(DomainException::class);
        $dto = AccountSeedHelper::new()->registerDto();
        /** @var InitRootAccount $initRootAccount */
        $initRootAccount = app()->make(InitRootAccount::class);
        $initRootAccount($dto);
    }
}
