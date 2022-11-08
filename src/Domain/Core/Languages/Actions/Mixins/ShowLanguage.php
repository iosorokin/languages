<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Actions\Mixins;

use App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;
use Domain\Core\Languages\Queries\GetLanguage;

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
