<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Entities;

trait EntityLanguageAttributes
{
    use LanguageAttributes;

    private string $name;

    private string $native_name;

    private string $code;
}
