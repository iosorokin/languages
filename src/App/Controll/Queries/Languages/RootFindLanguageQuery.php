<?php

declare(strict_types=1);

namespace App\Controll\Queries\Languages;

use Domain\Core\Language\Root\Control\Queries\RootFindLanguage;

final class RootFindLanguageQuery implements RootFindLanguage
{
    private int $id;

    public function __construct(array $attributes)
    {
        $this->id = $attributes['id'];
    }

    public function id(): int
    {
        return $this->id;
    }
}
