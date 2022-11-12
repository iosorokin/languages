<?php

declare(strict_types=1);

namespace WIP\Personal\Account\Actions;

use WIP\Personal\Account\Dto\NewAccountDto;
use WIP\Personal\Account\Model\Aggregates\Account;
use WIP\Personal\Account\Model\Aggregates\AccountFactory;
use WIP\Personal\Account\Repositories\AccountRepository;

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
