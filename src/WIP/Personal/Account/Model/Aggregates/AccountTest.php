<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Model\Aggregates;

use App\Base\Test\UnitCase;
use WIP\Personal\Account\Helpers\Test\AccountSeedHelper;
use WIP\Personal\Account\Repositories\AccountRepository;

final class AccountTest extends UnitCase
{
    private AccountSeedHelper $accountSeedHelper;
    private AccountFactory $accountFactory;

    protected function setUp(): void
    {
        parent::setUp();

        $this->accountSeedHelper = AccountSeedHelper::new();
        $this->accountFactory = $this->app->make(AccountFactory::class);
        $this->mock(AccountRepository::class);
    }

    public function testNewAccount()
    {
        $dto = $this->accountSeedHelper->registerDto();
        $account = $this->accountFactory->new($dto);
        $this->assertInstanceOf(Account::class, $account);
    }

    public function testAssignAsRoot()
    {
        $this->mock(AccountRepository::class)
            ->shouldReceive('hasRoot')
            ->andReturnFalse();
        $account = $this->accountSeedHelper->makeAccount();
        $account->enableRoot(app(AccountRepository::class));
        $this->assertTrue($account->isRoot());
    }
}
