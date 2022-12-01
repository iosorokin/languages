<?php

declare(strict_types=1);

namespace Core\Infrastructure\Database\Queries;

use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Core\Base\Model\Values\Identificatiors\Id\IntId;

final class FindById
{
    private function __construct(
        private IntId $id,
    ) {}

    public static function create(int|IntId $id): static
    {
        if (is_int($id))
            $id = BigIntId::new($id);

        return new self($id);
    }

    public function get(): int
    {
        return $this->id->get();
    }
}
