<?php

declare(strict_types=1);

namespace Domain\Languages\Application\Presenters\User;

use Domain\Languages\Application\Presenters\Mixins\ShowLanguage;
use Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

final class UserShowLanguage
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
