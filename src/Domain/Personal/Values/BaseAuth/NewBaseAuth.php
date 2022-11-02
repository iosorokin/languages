<?php

declare(strict_types=1);

namespace Domain\Personal\Values\BaseAuth;

use App\Values\Contacts\Email;
use App\Values\Security\Password;
use Domain\Personal\Values\BaseAuth\Password\BcryptHashedPassword;
use Domain\Personal\Values\BaseAuth\Password\RawPassword;

final class NewBaseAuth
{
    private Email $email;

    private Password $password;

    private function __construct() {}

    public static function new(Email $email, Password $password): self
    {
        $baseAuth = new self();
        $baseAuth->setEmail($email);
        $baseAuth->setPassword($password);

        return $baseAuth;
    }

    private function setEmail(Email $email): void
    {
        $this->email = $email;
    }

    public function email(): Email
    {
        return $this->email;
    }

    private function setPassword(Password $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function password(): Password
    {
        return $this->password;
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
            'email' => (string) $this->email(),
            'password' => (string) $this->password(),
        ];
    }
}
