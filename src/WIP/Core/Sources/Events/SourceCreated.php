<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Events;

use WIP\Core\Sources\Structures\Source;
use WIP\Internal\Container\Listeners\ContainerSourceCreatedListener;
use WIP\Internal\Favorites\Listeners\FavoriteSourceCreatedListener;

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
