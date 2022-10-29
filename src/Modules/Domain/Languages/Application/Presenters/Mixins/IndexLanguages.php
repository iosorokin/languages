<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Presenters\Mixins;

use Illuminate\Contracts\Database\Query\Builder;
use Modules\Domain\Languages\Domain\Collections\Languages;
use Modules\Domain\Languages\Domain\Factories\LanguageFactory;

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