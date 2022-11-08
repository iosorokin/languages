<?php

declare(strict_types=1);

namespace Domain\Support\Authorization;

use App\Values\Identificatiors\Id\IntId;

final class Manager
{
    public function __construct(
        private IntId $id,
    ) {}

    public function id(): IntId
    {
        return $this->id;
    }
}
