<?php

namespace Modules\Personal\Auth\Contexts;

use App\Contracts\Structures\AuthableStructure;
use App\Contracts\Structures\Personal\BaseAuthStructure;
use Illuminate\Support\Facades\Hash;

class BaseAuthContext
{
    public function __construct(
        public readonly BaseAuthStructure $structure,
    ) {}

    public function setAuthable(AuthableStructure $authable): self
    {
        //fixme сделать морфное имя в константу и проверку на её существоание
        $this->structure->authable_type = get_class($authable);
        $this->structure->authable_id = $authable->id;

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
