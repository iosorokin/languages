<?php

namespace Modules\Personal\User\Contexts;

use App\Contracts\Structures\Personal\UserStructure;

final class User
{
    public function __construct(
        public readonly UserStructure $structure
    ) {}

    public function setName(string $name): self
    {
        $this->structure->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->structure->name;
    }
}
