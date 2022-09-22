<?php

namespace Modules\Personal\Auth\Contexts\Fillers;

use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\BaseAuthStructure;
use Illuminate\Support\Facades\Hash;

class BaseAuthFiller
{
    public function __construct(
        public readonly BaseAuthStructure $structure,
    ) {}

    public function setAuthable(AuthableStructure $authable): self
    {
        $this->structure->setAuthable($authable);

        return $this;
    }

    public function setEmail(mixed $email): self
    {
        $this->structure->email = $email;

        return $this;
    }

    public function setPassword(mixed $password): self
    {
        $this->structure->password = Hash::make($password);

        return $this;
    }

    public function isCorrectPassword(string $password): bool
    {
        return Hash::check($password, $this->structure->password);
    }
}
