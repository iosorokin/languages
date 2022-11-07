<?php

declare(strict_types=1);

namespace Domain\Account\Actions\Console;

use App\Contracts\EventDispatcher;
use Domain\Account\Dto\NewAccountDto;
use Domain\Account\Model\Aggregates\Account;
use Domain\Account\Model\Aggregates\AccountFactory;
use Domain\Account\Repositories\AccountRepository;

final class InitRootAccount
{
    public function __construct(
        private EventDispatcher $eventDispatcher,
        private AccountFactory    $factory,
        private AccountRepository $repository,
    ) {}

    public function __invoke(NewAccountDto $dto): Account
    {
        $account = $this->factory->new($dto);
        $account->enableRoot($this->repository);
        $account->commit($this->repository, $this->eventDispatcher);

        return $account;
    }
}
