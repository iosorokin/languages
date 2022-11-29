<?php

declare(strict_types=1);

namespace App\Controll\Source\Student;

use App\Education\Source\Student\Controll\Cases\FindSource;

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
