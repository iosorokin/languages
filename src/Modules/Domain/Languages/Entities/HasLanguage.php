<?php

namespace Modules\Domain\Languages\Entities;

interface HasLanguage
{
    public function setLanguage(Language $language): self;

    public function getLanguage(): Language;
}
