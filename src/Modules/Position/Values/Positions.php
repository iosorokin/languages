<?php

namespace Modules\Position\Values;

use Exception;
use Illuminate\Support\Collection;

class Positions
{
    private Collection $positios;

    public function __construct(array $positions)
    {
        $this->positios = new Collection($positions);
    }

    public function add(int $id): void
    {
        $this->checkId($id);

        $this->positios->add($id);
    }

    public function remove(int $id): void
    {

    }

    private function checkId(int $id): void
    {
        $hasId = $this->positios->filter(function (int $item, int $key) use ($id) {
            return $item === $id;
        });

        if ($hasId) {
            throw new Exception('Попытка вставить позицию с существующим айди');
        }
    }

    private function findId()
    {

    }
}
