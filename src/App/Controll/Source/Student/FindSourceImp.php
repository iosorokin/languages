<?php

declare(strict_types=1);

namespace App\Controll\Source\Student;

use Domain\Core\Source\Base\Controll\Query\FindSource;

final class FindSourceImp implements FindSource
{
    public function __construct(
        private int $id,
    ) {}

    public function id(): int
    {
        return $this->id;
    }
}
