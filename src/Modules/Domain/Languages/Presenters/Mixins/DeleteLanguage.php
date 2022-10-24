<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Mixins;

use Modules\Domain\Languages\Model\Language;
use Modules\Domain\Languages\Presenters\Internal\GetLanguage;

final class DeleteLanguage
{
    public function __construct(
        private GetLanguage   $getLanguage,
    ) {}

    public function __invoke(Language|int $language): void
    {
        $language = is_int($language) ? $this->getLanguage->getOrThrowNotFound($language) : $language;
        // todo написать политику форс делита
        $language->delete();
    }
}
