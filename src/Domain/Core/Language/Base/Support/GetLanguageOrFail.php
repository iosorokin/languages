<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Support;

use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Base\Control\Query\FindLanguage;
use Domain\Core\Language\Base\Model\Aggregate\LanguageFactory;
use Domain\Core\Language\Base\Model\Aggregate\ReadonlyLanguage;
use Domain\Core\Language\Base\Repository\LanguageRepository;

final class GetLanguageOrFail
{
    public function __construct(
        private LanguageRepository $repository,
    ){}

    public function __invoke(FindLanguage $query): ReadonlyLanguage
    {
        $dto = $this->repository->find($query->find());
        if (! $dto) {
            throw new EntityNotFound('code', (string) $query->find());
        }
        $language = LanguageFactory::restore($dto);

        return $language;
    }
}
