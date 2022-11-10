<?php

declare(strict_types=1);

namespace App\Controll\Commands\Language;

use Domain\Core\Language\Root\Control\Commands\RootDeleteLanguage;

final class DeleteLanguageCommand implements RootDeleteLanguage
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