<?php

declare(strict_types=1);

namespace Core\Base\Model\Values\Identificatiors\Id;

use Core\Infrastructure\Support\Assert;

final class LazyId implements IntId
{
    private int $id;

    public static function new(): self
    {
        return new self();
    }

    public function get(): int
    {
        Assert::isSet($this, 'id');

        return $this->id;
    }

    public function set(int $id): self
    {
        Assert::isNotSet($this, 'id');
        $this->id = $id;

        return $this;
    }

    public function compare(IntId $id): bool
    {
        return $this->id === $id->get();
    }

    public function toInt(): int
    {
        return $this->id;
    }
}
