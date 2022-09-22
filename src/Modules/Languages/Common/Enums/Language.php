<?php

namespace Modules\Languages\Common\Enums;

enum Language: string
{
    case Real = 'real';
    case Learning = 'learning';

    public function isReal(): bool
    {
        return $this->value === self::Real->name;
    }

    public function isLearning(): bool
    {
        return $this->value === self::Learning->name;
    }
}
