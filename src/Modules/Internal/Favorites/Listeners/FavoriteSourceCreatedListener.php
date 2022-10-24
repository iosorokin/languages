<?php

declare(strict_types=1);

namespace Modules\Internal\Favorites\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Domain\Sources\Events\SourceCreated;
use Modules\Domain\Sources\Presenters\Requests\IsFirstUserSourceForLanguage;
use Modules\Internal\Favorites\Presenters\AddToFavorite;

final class FavoriteSourceCreatedListener implements ShouldQueue
{
    public function __construct(
        private IsFirstUserSourceForLanguage $isFirstUserSourceForLanguage,
        private AddToFavorite                $addToFavorite,
    ) {}

    public function __invoke(SourceCreated $event): void
    {
        $source = $event->source;
        $isFirstSource = ($this->isFirstUserSourceForLanguage)(
            $event->source->user_id,
            $event->source->language_id
        );

        if ($isFirstSource) {
            ($this->addToFavorite)($source->user, $source->language);
        }
    }
}
