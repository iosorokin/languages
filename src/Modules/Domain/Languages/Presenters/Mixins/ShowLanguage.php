<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Mixins;

use Modules\Domain\Languages\Presenters\Internal\GetLanguage;
use Modules\Domain\Languages\Model\Language;

final class ShowLanguage
{
    public function __construct(
        private GetLanguage $getLanguage,
    ) {}

    public function __invoke(Language|int $language): Language
    {
        $language = is_int($language) ? $this->getLanguage->getOrThrowNotFound($language) : $language;

        return $language;
    }
}
