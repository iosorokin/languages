<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Actions\Console;

use App\Contracts\EventDispatcher;
use Domain\Personal\Account\Dto\NewAccountDto;
use Domain\Personal\Account\Model\Aggregates\Account;
use Domain\Personal\Account\Model\Aggregates\AccountFactory;
use Domain\Personal\Account\Repositories\AccountRepository;

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
