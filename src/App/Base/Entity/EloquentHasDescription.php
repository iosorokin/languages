<?php

declare(strict_types=1);

namespace App\Base\Entity;

trait EloquentHasDescription
{
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}
