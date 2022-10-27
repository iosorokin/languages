<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Presenters\Mixins;

use Illuminate\Contracts\Database\Query\Builder;
use Modules\Core\Languages\Domain\Collections\Languages;
use Modules\Core\Languages\Domain\Factories\LanguageFactory;

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
