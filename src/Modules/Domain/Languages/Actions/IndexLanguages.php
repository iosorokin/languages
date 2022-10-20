<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Actions;

use Illuminate\Contracts\Database\Query\Builder;
use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Personal\Auth\Contexts\Client;

final class IndexLanguages
{
    public function __construct(
        private LanguageRepository $repository,
        private LanguageFactory $factory,
    ) {}

    public function __invoke(Client $client, Builder $query): Languages
    {
        $laravelPaginator = $this->repository->cursorPaginate($query);
        $languages = $this->factory->collection($laravelPaginator);

        return $languages;
    }
}
