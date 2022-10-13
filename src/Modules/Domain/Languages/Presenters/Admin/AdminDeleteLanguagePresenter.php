<?php

namespace Modules\Domain\Languages\Presenters\Admin;

interface AdminDeleteLanguagePresenter
{
    public function __invoke(int $languageId): void;
}
