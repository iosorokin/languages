<?php

namespace Modules\Container\Contexts;

trait ContainerState
{
    private ?int $lastPos;

    private int $count;

    public function setLastPosition(?int $pos): self
    {
        $this->lastPos = $pos;

        return $this;
    }

    public function getLastPosition(): ?int
    {
        return $this->lastPos;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}
