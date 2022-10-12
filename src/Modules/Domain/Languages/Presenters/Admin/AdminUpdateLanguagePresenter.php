<?php

namespace Modules\Domain\Languages\Presenters\Admin;

interface AdminUpdateLanguagePresenter
{
    public function __invoke(int $languageId, array $attributes): void;
}
