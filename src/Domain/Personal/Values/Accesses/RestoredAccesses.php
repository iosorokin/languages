<?php

declare(strict_types=1);

namespace Domain\Personal\Values\Accesses;

final class RestoredAccesses extends BaseAccesses implements Accesses
{
    public static function make(array $list = []): self
    {
        $collection = collect();
        foreach ($list as $item) {
            $access = Access::tryFrom($item);
            $collection->push($access);
        }

        return new self($collection);
    }
}
