<?php

declare(strict_types=1);

namespace App\Dto\Language;

use Domain\Core\Languages\Actions\Manager\Dto\UpdateLanguageDto;

final class UpdateLanguage extends Language implements UpdateLanguageDto
{
    protected int $id;

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);

        $this->id = $attributes['id'];
    }

    public function id(): int
    {
        return $this->id;
    }
}
