<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Guest;

use Modules\Domain\Languages\Actions\IndexLanguages;
use Modules\Domain\Languages\Collections\Languages;

final class GuestIndexLanguages implements GuestIndexLanguagesPresenter
{
    public function __construct(
        private IndexLanguages $indexLanguages,
    ) {}

    public function __invoke(array $attributes): Languages
    {
        $languages = ($this->indexLanguages)($attributes);

        return $languages;
    }
}
