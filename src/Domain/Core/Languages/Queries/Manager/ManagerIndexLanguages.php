<?php

namespace Domain\Core\Languages\Queries\Manager;

use App\Roles\ContentManager;
use Domain\Core\Languages\Actions\Manager\Dto\IndexLanguagesDto;
use Domain\Core\Languages\Actions\Manager\IndexLanguages;
use Domain\Core\Languages\Actions\Manager\LanguageQueryBuilder;
use Domain\Core\Languages\Model\Collections\Languages;

class ManagerIndexLanguages
{
    public function __construct(
        private LanguageQueryBuilder   $queryManager,
        private IndexLanguages         $indexLanguages,
    ) {}

    public function __invoke(ContentManager $manager, IndexLanguagesDto $dto): Languages
    {
        $laravelPaginator = $query->cursorPaginate();
        $languages = $this->factory->collection($laravelPaginator);

        return $languages;
    }
}
