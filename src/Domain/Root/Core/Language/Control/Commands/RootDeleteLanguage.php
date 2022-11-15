<?php

declare(strict_types=1);

namespace Domain\Root\Core\Language\Control\Commands;

final class RootDeleteLanguage
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
