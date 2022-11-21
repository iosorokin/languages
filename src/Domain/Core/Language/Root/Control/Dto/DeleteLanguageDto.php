<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Dto;

use App\Base\Model\Roles\Root;

final class DeleteLanguageDto
{
    public function __construct(
        private Root $root,
        private string $code,
    ) {}

    public function root(): Root
    {
        return $this->root;
    }

    public function code(): string
    {
        return $this->code;
    }
}
