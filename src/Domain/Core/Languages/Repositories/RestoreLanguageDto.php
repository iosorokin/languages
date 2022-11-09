<?php

namespace Domain\Core\Languages\Repositories;

use Carbon\Carbon;

interface RestoreLanguageDto
{
    public function id(): int;

    public function name(): string;

    public function nativeName(): string;

    public function isActive(): bool;

    public function owner(): int;

    public function createdAt(): Carbon;
}
