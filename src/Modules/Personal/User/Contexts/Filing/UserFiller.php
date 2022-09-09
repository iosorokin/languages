<?php

declare(strict_types=1);

namespace Modules\Personal\User\Contexts\Filing;

use App\Contracts\Structures\Personal\UserStructure;

abstract class UserFiller
{
    public function __construct(
        private UserStructure $structure
    ) {}

    public function setStructure(UserStructure $user): static
    {
        $this->structure = $user;

        return $this;
    }

    public function getStructure(): UserStructure
    {
        return $this->structure;
    }

    public function setName(string $name): static
    {
        $this->structure->name = $name;

        return $this;
    }
}
