<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Actions\Mixins;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Domain\Core\Languages\Queries\GetLanguage;
use Domain\Support\Authorization\Manager;

final class DeleteLanguage
{
    public function __construct(
        private GetLanguage   $getLanguage,
    ) {}

    public function __invoke(Manager $manager, int $languageId): void
    {
        $language = is_int($language) ? $this->getLanguage->getOrThrowNotFound($language) : $language;
        // todo написать политику форс делита
        $language->delete();
    }
}
