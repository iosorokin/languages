<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Filters\Name;

use App\Base\Filter\FilterItem;

final class NativeNameFilter implements FilterItem
{
    public function __construct(
        private string $nativeName,
    ) {}

    public function value(): string
    {
        return $this->nativeName;
    }
}
