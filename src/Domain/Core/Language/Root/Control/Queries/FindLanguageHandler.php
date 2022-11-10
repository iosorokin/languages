<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Queries;

use App\Roles\ContentManager;
use Domain\Core\Languages\Model\Manager\Queries\Mixins\GetLanguage;
use Domain\Manager\Languages\Responses\ManagerLanguageStructure;

class FindLanguageHandler
{
    public function __construct(
        private GetLanguage $getLanguage,
    ) {}

    public function __invoke(ContentManager $manager, RootFindLanguage $dto): ManagerLanguageStructure
    {
        $language = $this->getLanguage->getOrFail($dto->id());

        return $language->toResponse();
    }
}
