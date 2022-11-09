<?php

declare(strict_types=1);

namespace App\Controll\Queries\Languages;

use Domain\Core\Languages\Model\Manager\Queries\FindLanguage;

final class FindLanguageQuery implements FindLanguage
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
