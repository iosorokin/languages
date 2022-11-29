<?php

declare(strict_types=1);

namespace Core\Infrastructure\Database\Collections\Language;

use Core\Base\Collections\CollectionDriver;

final class RawLanguageCollection
{
    public function __construct(
        private CollectionDriver $driver
    ) {}

    public function each(callable $callback): self
    {
        $structureWrapper = function (array $value) {

        };
        $this->driver->each($callback);

        return $this;
    }
}
