<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Actions\Manager\Dto;

interface UpdateLanguageDto extends LanguageDto
{
    public function id(): int;
}
