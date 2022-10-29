<?php

namespace Modules\Domain\Languages\Domain;

use Modules\Domain\Languages\Domain\Contexts\Language;

interface LanguageRepository
{
    public function add(Language $language): void;
}
