<?php

declare(strict_types=1);

namespace Domain\Account\Model\Entities\Accesses;

enum AccessValue: string
{
    case Root = 'root';

    case Student = 'student';

    public function isRoot(): bool
    {
        return $this->value === self::Root->value;
    }

    public function isStudent(): bool
    {
        return $this->value === self::Student->value;
    }
}
