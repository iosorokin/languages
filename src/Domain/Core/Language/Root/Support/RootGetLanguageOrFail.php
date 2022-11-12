<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Support;

use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;
use Domain\Core\Language\Root\Model\Aggregates\RootLanguage;
use Domain\Core\Language\Root\Repository\RootLanguageRepository;

final class RootGetLanguageOrFail
{
    public function __construct(
        private RootLanguageRepository $repository,
    ){}

    public function __invoke(RootFindLanguage $query): RootLanguage
    {
        $language = $this->repository->find($query);
        if (! $language) {
            throw new EntityNotFound('language_id', $query->id());
        }

        return $language;
    }
}
