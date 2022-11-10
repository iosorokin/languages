<?php

declare(strict_types=1);

namespace App\Model\Roles;

use App\Model\Values\Identificatiors\Id\IntId;

final class StudentImp implements Student
{
    public function __construct(
        private IntId $id,
    ) {}

    public function id(): IntId
    {
        return $this->id;
    }
}
