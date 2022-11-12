<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Queries;

final class RootFindLanguage
{
    public function __construct(
        private int $id
    ) {}

    public static function new(array $attribute): self
    {
        $query = new self(
            id: $attribute['id'],
        );

        return $query;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function filters()
    {

    }
}
