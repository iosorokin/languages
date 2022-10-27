<?php

declare(strict_types=1);

namespace Modules\Personal\Domain\Contexts\BaseAuth\Values;

use Modules\Personal\Domain\Values\Email;
use Modules\Personal\Domain\Values\Password;

final class BaseAuth
{
    public function __construct(
        private Email $email,
        private Password $password,
    ) {}

    public function email(): Email
    {
        return $this->email;
    }

    public function password(): Password
    {
        return $this->password;
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email()->value(),
            'password' => $this->password()->value(),
        ];
    }
}
