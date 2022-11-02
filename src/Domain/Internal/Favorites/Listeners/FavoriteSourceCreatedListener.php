<?php

declare(strict_types=1);

namespace Domain\Internal\Favorites\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Domain\Sources\Events\SourceCreated;
use Domain\Sources\Presenters\Requests\IsFirstUserSourceForLanguage;
use Domain\Internal\Favorites\Presenters\AddToFavorite;

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
