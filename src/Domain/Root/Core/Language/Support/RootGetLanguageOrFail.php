<?php

declare(strict_types=1);

namespace Domain\Root\Core\Language\Support;

use App\Exceptions\EntityNotFound;
use Domain\Root\Core\Language\Control\Queries\RootFindLanguage;
use Domain\Root\Core\Language\Model\Aggregates\RootLanguage;
use Domain\Root\Core\Language\Repository\RootLanguageRepository;

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
