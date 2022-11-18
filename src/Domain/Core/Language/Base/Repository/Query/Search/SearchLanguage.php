<?php

namespace Domain\Core\Language\Base\Repository\Query\Search;

use Stringable;

interface SearchLanguage extends Stringable
{
    public function get(): string;
}
