<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Manager\Responses;

use Domain\Core\Languages\Model\Manager\Collections\Languages;

final class LanguagesResponse
{
    public function __construct(
        private Languages $languages,
    ) {}
}
