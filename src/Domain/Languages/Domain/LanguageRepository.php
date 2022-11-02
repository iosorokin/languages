<?php

namespace Domain\Languages\Domain;

use Domain\Languages\Domain\Contexts\Language;

interface LanguageRepository
{
    public function add(Language $language): void;
}
