<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Queries\User;

use Domain\Core\Languages\Commands\Mixins\ShowLanguage;
use Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel;

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
