<?php

declare(strict_types=1);

namespace App\Model\Roles;

use App\Model\Values\Identificatiors\Id\IntId;

final class RootImp implements Root
{
    public function __construct(
        private IntId $id,
    ) {}

    public function id(): IntId
    {
        return $this->id;
    }
}
