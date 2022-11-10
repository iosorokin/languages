<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Commands\Root;

use App\Model\Roles\Root;
use Domain\Core\Languages\Model\Manager\Commands\Root\Dto\RootActivateLanguageDto;

final class ActivateLanguage
{
    public function __invoke(Root $root, RootActivateLanguageDto $dto)
    {

    }
}
