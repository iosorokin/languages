<?php

declare(strict_types=1);

namespace Domain\Guest\Core\Language\Model\Aggregate;

use App\Model\Values\Language\Code\Code;
use App\Model\Values\Language\Name\Name;
use App\Model\Values\Language\NativeName\NativeName;
use App\Model\Values\State\IsActive;

final class GuestLanguage
{
    public function __construct(
        private Name       $name,
        private NativeName $nativeName,
        private Code       $code,
        private IsActive   $isActive,
    ) {}

    public function name(): Name
    {
        return clone $this->name;
    }

    public function nativeName(): NativeName
    {
        return clone $this->nativeName;
    }

    public function code(): Code
    {
        return clone $this->code;
    }

    public function isActive(): IsActive
    {
        return clone $this->isActive;
    }
}
