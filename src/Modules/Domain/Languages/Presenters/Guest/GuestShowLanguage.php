<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Guest;

use Modules\Domain\Languages\Presenters\Mixins\ShowLanguage;
use Modules\Domain\Languages\Model\Language;

final class GuestShowLanguage
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
