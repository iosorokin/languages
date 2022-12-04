<?php

namespace Domain\Education\Language\Base\Repository\Query\Find;

use Stringable;

interface FindLanguage extends Stringable
{
    public function get(): string;
}
