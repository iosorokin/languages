<?php

namespace Modules\Core\Languages\Domain;

use Modules\Core\Languages\Domain\Contexts\Language;

interface LanguageRepository
{
    public function add(Language $language): void;
}