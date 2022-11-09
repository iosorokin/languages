<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Queries\Manager;

use App\Roles\ContentManager;
use Domain\Core\Languages\Model\Manager\Queries\FindLanguage;
use Domain\Core\Languages\Model\Manager\Queries\Mixins\GetLanguage;
use Domain\Core\Languages\Model\Manager\Responses\LanguageResponse;

class ManagerFindLanguage
{
    public function __construct(
        private GetLanguage $getLanguage,
    ) {}

    public function __invoke(ContentManager $manager, FindLanguage $dto): LanguageResponse
    {
        $language = $this->getLanguage->getOrFail($dto->id());

        return $language->toResponse();
    }
}
