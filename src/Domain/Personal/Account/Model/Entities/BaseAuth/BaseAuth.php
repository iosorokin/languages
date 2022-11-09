<?php

declare(strict_types=1);

namespace Domain\Personal\Account\Model\Entities\BaseAuth;

use App\Base\Entity;
use App\Values\Contacts\Email\Email;
use App\Values\Identificatiors\Id\IntId;
use App\Values\Security\Password;
use Domain\Personal\Account\Model\Values\Password\BcryptHashedPassword;
use Domain\Personal\Account\Model\Values\Password\RawPassword;

final class BaseAuth extends Entity
{
    public function __construct(
        private readonly IntId $accountId,
        private Email $email,
        private Password $password,
    ) {}

    public function accountId(): IntId
    {
        return $this->accountId;
    }

    public function email(): Email
    {
        return clone $this->email;
    }

    public function password(): Password
    {
        return clone $this->password;
    }

    public function secure(): void
    {
        if ($this->password instanceof RawPassword) {
            $this->password = BcryptHashedPassword::new($this->password);
        }
    }

    public function toArray(): array
    {
        return [
            'account_id' => $this->accountId()->toInt(),
            'email' => (string) $this->email(),
            'password' => (string) $this->password(),
        ];
    }
}
