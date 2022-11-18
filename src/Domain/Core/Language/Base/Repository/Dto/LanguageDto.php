<?php

namespace Domain\Core\Language\Base\Repository\Dto;

use Carbon\Carbon;

interface LanguageDto
{
    public function code(): string;

    public function owner(): int;

    public function name(): string;

    public function nativeName(): string;

    public function status(): string;

    public function createdAt(): Carbon;
}
