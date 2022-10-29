<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Presenters\User;

use Modules\Domain\Languages\Application\Presenters\Mixins\ShowLanguage;
use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

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
