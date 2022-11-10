<?php

declare(strict_types=1);

namespace Domain\Core\Language\Guest\Control\Queries;

final class FindLanguage
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

    public function filters()
    {

    }
}
