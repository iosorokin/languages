<?php

declare(strict_types=1);

namespace Domain\Account\Actions;

use Domain\Account\Dto\NewAccountDto;
use Domain\Account\Model\Aggregates\Account;
use Domain\Account\Model\Aggregates\AccountFactory;
use Domain\Account\Repositories\AccountRepository;

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
