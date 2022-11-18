<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Commands;

final class UpdateLanguage extends LanguageCommand
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
