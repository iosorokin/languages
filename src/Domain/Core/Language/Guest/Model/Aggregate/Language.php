<?php

declare(strict_types=1);

namespace Domain\Core\Language\Guest\Model\Aggregate;

use App\Model\Values\Language\Code\Code;
use App\Model\Values\Language\Name\Name;
use App\Model\Values\Language\NativeName\NativeName;

final class Language
{
    public function __construct(
        private Name       $name,
        private NativeName $nativeName,
        private Code       $code,
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
}
