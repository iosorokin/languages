<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Application\Presenters\Mixins;

use Domain\Core\Languages\Domain\Collections\Languages;
use Domain\Core\Languages\Domain\Factories\LanguageFactory;
use Illuminate\Contracts\Database\Query\Builder;

final class IndexLanguages
{
    public function __construct(
        private LanguageFactory $factory,
    ) {}

    public function __invoke(Builder $query): Languages
    {
        $laravelPaginator = $query->cursorPaginate();
        $languages = $this->factory->collection($laravelPaginator);

        return $languages;
    }
}
