<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Commands;

final class DeleteLanguage
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
