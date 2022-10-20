<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Actions;

use Modules\Domain\Languages\Collections\Languages;
use Modules\Domain\Languages\Queries\Filters\LanguageFilter;
use Modules\Domain\Languages\Queries\LanguageQuery;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Personal\Auth\Contexts\Client;

final class IndexLanguages
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(Client $client, LanguageQuery $query): Languages
    {
        $languages = $this->repository->all($filter);

        return $languages;
    }
}
