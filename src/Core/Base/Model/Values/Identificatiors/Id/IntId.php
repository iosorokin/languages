<?php

namespace Core\Base\Model\Values\Identificatiors\Id;

use Core\Base\Intable;
use Core\Base\Model\Values\ValueObject;

interface IntId extends ValueObject, Intable
{
    public function get(): int;

    public function compare(IntId $id): bool;
}
