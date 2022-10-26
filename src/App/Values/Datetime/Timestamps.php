<?php

declare(strict_types=1);

namespace App\Values\Datetime;


final class Timestamps
{
    public function __construct(
        private CreatedAt $createdAt,
        private UpdatedAt $updatedAt,
    ) {}

    public function createdAt(): CreatedAt
    {
        return $this->createdAt;
    }

    public function updatedAt(): UpdatedAt
    {
        return $this->updatedAt;
    }
}
