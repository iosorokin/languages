<?php

namespace Domain\Account\Repositories;

use App\Values\Contacts\Email\Email;
use Domain\Account\Model\Aggregates\Account;

interface AccountRepository
{
    public function add(Account $user): int;

    public function countUsers(): int;

    public function hasEmail(Email $email): bool;

    public function getByEmail(Email $email): ?Account;

    public function hasRoot(): bool;
}
