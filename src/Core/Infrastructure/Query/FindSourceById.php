<?php

declare(strict_types=1);

namespace Core\Infrastructure\Query;

use Core\Base\Model\Values\Identificatiors\Id\IntId;
use Core\Infrastructure\Database\Queries\FindById;

final class FindSourceById implements FindSource
{
    private function __construct(
        private FindById $findById
    ) {}

    public static function create(int|IntId $id): self
    {
        return new self(FindById::create($id));
    }

    public function get(): mixed
    {
        return $this->findById->get();
    }
}
