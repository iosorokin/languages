<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Mixins;

use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Contexts\Client;

final class ShowLanguage
{
    public function __construct(
        private GetLanguagePresenter $getLanguage,
    ) {}

    public function __invoke(Language|int $language): Language
    {
        $language = is_int($language) ? $this->getLanguage->getOrThrowNotFound($language) : $language;

        return $language;
    }
}
