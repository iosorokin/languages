<?php

namespace Domain\Education\Language\Base\Repository\Query\Search;

use Stringable;

interface SearchLanguage extends Stringable
{
    public function value(): string;
}
