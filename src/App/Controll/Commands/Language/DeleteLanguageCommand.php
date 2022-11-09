<?php

declare(strict_types=1);

namespace App\Controll\Commands\Language;

use Domain\Core\Languages\Model\Manager\Commands\Manager\DeleteLanguage;

final class DeleteLanguageCommand implements DeleteLanguage
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
