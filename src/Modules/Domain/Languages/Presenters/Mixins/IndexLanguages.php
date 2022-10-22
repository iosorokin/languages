<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Mixins;

use Illuminate\Contracts\Database\Query\Builder;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Personal\Auth\Contexts\Client;

final class IndexLanguages
{
    public function __construct(
        private LanguageFactory $factory,
    ) {}

    public function __invoke(Builder $query): Languages
    {
        $laravelPaginator = $this->factory
            ->repository()
            ->cursorPaginate($query);
        $languages = $this->factory
            ->structure()
            ->collection($laravelPaginator);

        return $languages;
    }
}
