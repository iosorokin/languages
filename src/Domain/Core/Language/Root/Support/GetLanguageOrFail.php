<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Support;

use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Root\Control\Dto\FindLanguageDto;
use Domain\Core\Language\Root\Model\Language;
use Domain\Core\Language\Root\Repository\LanguageRepository;

final class GetLanguageOrFail
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(FindLanguageDto $dto): Language
    {
        $language = $this->repository->find($dto);
        if (! $language) {
            throw new EntityNotFound('code', $dto->find()->get());
        }

        return $language;
    }
}
