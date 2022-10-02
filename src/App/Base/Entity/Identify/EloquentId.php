<?php

declare(strict_types=1);

namespace App\Base\Entity\Identify;

trait EloquentId
{
    public function getId(): int
    {
        return $this->id;
    }
}
