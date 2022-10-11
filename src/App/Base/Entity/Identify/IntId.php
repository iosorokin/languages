<?php

declare(strict_types=1);

namespace App\Base\Entity\Identify;

trait IntId
{
    private int $id;

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
