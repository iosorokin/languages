<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Application\Presenters\Guest;

use Modules\Domain\Languages\Application\Presenters\Mixins\ShowLanguage;
use Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel;

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
