<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Actions\Mixins;

use Domain\Core\Languages\Factories\LanguageFactory;
use Domain\Core\Languages\Model\Collections\Languages;
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
