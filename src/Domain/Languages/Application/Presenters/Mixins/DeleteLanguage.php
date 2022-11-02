<?php

declare(strict_types=1);

namespace Domain\Languages\Application\Presenters\Mixins;

use Domain\Languages\Application\Presenters\Internal\GetLanguage;
use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

final class DeleteLanguage
{
    public function __construct(
        private GetLanguage   $getLanguage,
    ) {}

    public function __invoke(LanguageModel|int $language): void
    {
        $language = is_int($language) ? $this->getLanguage->getOrThrowNotFound($language) : $language;
        // todo написать политику форс делита
        $language->delete();
    }
}
