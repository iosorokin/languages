<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Actions\Guest;

use App\Contracts\EventDispatcher;
use WIP\Personal\Account\Dto\NewAccountDto;
use WIP\Personal\Account\Model\Aggregates\AccountFactory;
use WIP\Personal\Account\Repositories\AccountRepository;

final class Register
{
    public function __construct(
        private EventDispatcher $eventDispatcher,
        private AccountFactory    $userFactory,
        private AccountRepository $repository,
    ) {}

    public function __invoke(NewAccountDto $dto): int
    {
        $account = $this->userFactory->new($dto);
        $account->commit($this->repository, $this->eventDispatcher);

        return $account->id()->toInt();
    }
}
