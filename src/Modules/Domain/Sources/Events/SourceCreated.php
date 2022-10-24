<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\Domain\Sources\Structures\Source;
use Modules\Internal\Container\Listeners\ContainerSourceCreatedListener;
use Modules\Internal\Favorites\Listeners\FavoriteSourceCreatedListener;

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
