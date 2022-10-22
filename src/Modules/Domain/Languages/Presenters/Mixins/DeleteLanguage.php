<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Mixins;

use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Languages\Structures\Language;

final class DeleteLanguage
{
    public function __construct(
        private GetLanguagePresenter   $getLanguage,
        private LanguageFactory        $languageFactory,
    ) {}

    public function __invoke(Language|int $language): void
    {
        $language = is_int($language) ? $this->getLanguage->getOrThrowNotFound($language) : $language;
        // todo написать политику форс делита
        $this->languageFactory
            ->repository()
            ->delete($language);
    }
}
