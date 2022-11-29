<?php

declare(strict_types=1);

namespace App\Education\Language\Root\Infrastructure\Database\Structures;

use Core\Base\Database\Structure;

final class OwnerStructure extends Structure
{
    public function __construct(
        private int $id,
        private string $name,
    ) {}
}
