<?php

declare(strict_types=1);

namespace Modules\Core\Languages\Application\Presenters\Guest;

use Modules\Core\Languages\Application\Presenters\Mixins\ShowLanguage;
use Modules\Core\Languages\Infrastructure\Model\Language;

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
