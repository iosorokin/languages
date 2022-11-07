<?php

declare(strict_types=1);

namespace Domain\Internal\Favorites\Listeners;

use Domain\Core\Sources\Events\SourceCreated;
use Domain\Core\Sources\Presenters\Requests\IsFirstUserSourceForLanguage;
use Domain\Internal\Favorites\Presenters\AddToFavorite;
use Illuminate\Contracts\Queue\ShouldQueue;

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
