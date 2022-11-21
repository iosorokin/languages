<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Dto;

use App\Base\Model\Roles\Root;

final class UpdateLanguageDto
{
    public function __construct(
        private Root   $root,
        private string $nativeName,
        private string $name,
        private string $code,
    ) {}

    public function root(): Root
    {
        return $this->root;
    }

    public function nativeName(): string
    {
        return $this->nativeName;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function code(): string
    {
        return $this->code;
    }
}
