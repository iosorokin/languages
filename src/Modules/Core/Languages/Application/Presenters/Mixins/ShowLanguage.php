<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Presenters\Mixins;

use Modules\Core\Languages\Application\Presenters\Internal\GetLanguage;
use Modules\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

final class ShowLanguage
{
    public function __construct(
        private GetLanguage $getLanguage,
    ) {}

    public function __invoke(LanguageModel|int $language): LanguageModel
    {
        $language = is_int($language) ? $this->getLanguage->getOrThrowNotFound($language) : $language;

        return $language;
    }
}