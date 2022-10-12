<?php

declare(strict_types=1);

namespace App\Base\Structures\Identify;

trait IntId
{
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
