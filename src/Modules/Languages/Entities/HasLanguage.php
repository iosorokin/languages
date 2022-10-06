<?php

namespace Modules\Languages\Entities;

interface HasLanguage
{
    public function setLanguage(Language $language): self;

    public function getLanguage(): Language;
}
