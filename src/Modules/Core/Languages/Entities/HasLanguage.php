<?php

namespace Modules\Core\Languages\Entities;

interface HasLanguage
{
    public function setLanguage(Language $language): self;

    public function getLanguage(): Language;
}
