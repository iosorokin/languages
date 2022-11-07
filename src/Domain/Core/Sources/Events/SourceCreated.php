<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Events;

use Domain\Core\Sources\Structures\Source;
use Domain\Internal\Container\Listeners\ContainerSourceCreatedListener;
use Domain\Internal\Favorites\Listeners\FavoriteSourceCreatedListener;

final class SourceCreated
{
    public function __construct(
        public readonly Source $source
    ) {}

    public static function listeners(): array
    {
        return [
            ContainerSourceCreatedListener::class,
            FavoriteSourceCreatedListener::class,
        ];
    }
}
