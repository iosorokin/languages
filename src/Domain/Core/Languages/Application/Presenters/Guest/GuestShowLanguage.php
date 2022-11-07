<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Application\Presenters\Guest;

use Domain\Core\Languages\Application\Presenters\Mixins\ShowLanguage;
use Domain\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

final class GuestShowLanguage
{
    public function __construct(
        private ShowLanguage $showLanguage,
    ) {}

    public function __invoke(int $id): LanguageModel
    {
        $language = ($this->showLanguage)($id);

        return $language;
    }
}
