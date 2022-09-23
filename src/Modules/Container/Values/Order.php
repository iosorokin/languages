<?php

declare(strict_types=1);

namespace Modules\Container\Values;

use Modules\Container\Contracts\ContainerableElement;

final class Order
{
    private array $collection;

    public function __construct(
        private string $json
    ) {

    }

    public function push(ContainerableElement $content): void
    {

    }

    private function transformToElement(ContainerableElement $content): array
    {

    }
}
