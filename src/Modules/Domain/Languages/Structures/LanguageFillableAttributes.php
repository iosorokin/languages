<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Structures;

trait LanguageFillableAttributes
{
    public function fillableAttributes(): array
    {
        return [
            'name' => $this->getName(),
            'native_name' => $this->getNativeName(),
            'code' => $this->getCode(),
            'is_active' => $this->isActive(),
        ];
    }
}
