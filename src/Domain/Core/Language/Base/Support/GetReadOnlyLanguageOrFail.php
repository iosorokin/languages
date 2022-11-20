<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Support;

use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Base\Control\Query\FindLanguage;
use Domain\Core\Language\Base\Model\Aggregate\Language;
use Domain\Core\Language\Base\Model\Aggregate\LanguageFactory;
use Domain\Core\Language\Base\Repository\LanguageRepository;

final class GetReadOnlyLanguageOrFail
{
    public function __construct(
        private LanguageRepository $repository,
    ){}

    public function __invoke(FindLanguage $query): Language
    {
        $dto = $this->repository->find($query);
        if (! $dto) {
            throw new EntityNotFound('code', $query->find()->get());
        }
        $language = LanguageFactory::restore($dto);

        return $language;
    }
}
