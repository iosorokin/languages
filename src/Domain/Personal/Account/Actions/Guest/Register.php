<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Actions\Guest;

use App\Contracts\EventDispatcher;
use Domain\Personal\Account\Dto\NewAccountDto;
use Domain\Personal\Account\Model\Aggregates\AccountFactory;
use Domain\Personal\Account\Repositories\AccountRepository;

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
