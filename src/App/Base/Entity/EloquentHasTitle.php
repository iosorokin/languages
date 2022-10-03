<?php

declare(strict_types=1);

namespace App\Base\Entity;

trait EloquentHasTitle
{
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
