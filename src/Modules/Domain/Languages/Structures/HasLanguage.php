<?php

namespace Modules\Domain\Languages\Structures;

interface HasLanguage
{
    public function setLanguage(Language $language): self;

    public function getLanguage(): Language;

    public function getLanguageId(): int;
}
