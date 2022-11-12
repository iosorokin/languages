<?php

declare(strict_types=1);

namespace WIP\Personal\Authorization;

use App\Model\Values\Identificatiors\Id\IntId;

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
