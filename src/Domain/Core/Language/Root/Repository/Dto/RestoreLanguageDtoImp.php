<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Repository\Dto;

use Carbon\Carbon;
use Domain\Core\Language\Base\Repository\Dto\RestoreLanguageDtoImp;

final class RestoreLanguageDtoImp implements RestoreLanguageDto
{
    public function __construct(
        private RestoreLanguageDtoImp $dto
    ) {}

    public function code(): string
    {
        return $this->dto->code();
    }

    public function owner(): int
    {
        return $this->dto->owner();
    }

    public function name(): string
    {
        return $this->dto->name();
    }

    public function nativeName(): string
    {
        return $this->dto->nativeName();
    }

    public function status(): string
    {
        return $this->dto->status();
    }

    public function createdAt(): Carbon
    {
        return $this->dto->createdAt();
    }
}
