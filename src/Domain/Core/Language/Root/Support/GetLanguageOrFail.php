<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Support;

use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Guest\Control\Queries\FindLanguage;
use Domain\Core\Language\Guest\Model\Aggregate\Language;
use Domain\Core\Language\Guest\Repository\LanguageRepository;

final class GetLanguageOrFail
{
    public function __construct(
        private LanguageRepository $repository,
    ){}

    public function __invoke(FindLanguage $query): Language
    {
        $language = $this->repository->find($query);
        if (! $language) {
            throw new EntityNotFound('language_id', $query->id());
        }

        return $language;
    }
}
