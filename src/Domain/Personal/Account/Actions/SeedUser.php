<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Actions;

use Domain\Personal\Account\Dto\NewAccountDto;
use Domain\Personal\Account\Model\Aggregates\Account;
use Domain\Personal\Account\Model\Aggregates\AccountFactory;
use Domain\Personal\Account\Repositories\AccountRepository;

final class SeedUser
{
    public function __construct(
        private AccountFactory    $factory,
        private AccountRepository $repository,
    ) {}

    public function __invoke(NewAccountDto $dto): Account
    {
        $user = $this->factory->new($dto);
        $this->repository->add($user);

        return $user;
    }
}
