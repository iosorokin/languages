<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\User;

use Modules\Domain\Languages\Presenters\Mixins\ShowLanguage;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserShowLanguage implements UserShowLanguagePresenter
{
    public function __construct(
        private ShowLanguage $showLanguage,
    ) {}

    public function __invoke(int $id): Language
    {
        $language = ($this->showLanguage)($id);

        return $language;
    }
}
