<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Dto;

final class OwnerDto
{
    public function __construct(
        private int $id,
    ) {}

    public function id(): int
    {
        return $this->id;
    }
}
