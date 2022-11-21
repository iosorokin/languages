<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Support;

use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Base\Model\Aggregate\Language;
use Domain\Core\Language\Base\Model\Aggregate\LanguageFactory;
use Domain\Core\Language\Base\Repository\LanguageRepository;
use Domain\Core\Language\Root\Control\Dto\FindLanguageDto;

final class GetReadOnlyLanguageOrFail
{
    public function __construct(
        private LanguageRepository $repository,
    ){}

    public function __invoke(FindLanguageDto $dto): Language
    {

    }
}
