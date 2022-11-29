<?php

namespace App\Education\Language\Base\Repository\Structure;

use Carbon\Carbon;

interface LanguageStructure
{
    public function code(): string;

    public function owner(): int;

    public function name(): string;

    public function nativeName(): string;

    public function status(): string;

    public function createdAt(): Carbon;
}
