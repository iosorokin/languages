<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Modules\Internal\Container\Listeners\ContainerSourceCreatedListener;
use Modules\Internal\Favorites\Listeners\FavoriteSourceCreatedListener;

final class SourceCreated
{
    use Dispatchable;

    public function __construct(
        public int $userId,
        public int $languageId,
        public int $sourceId,
    ) {}

    public static function listeners(): array
    {
        return [
            ContainerSourceCreatedListener::class,
            FavoriteSourceCreatedListener::class,
        ];
    }
}
