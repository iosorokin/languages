<?php

namespace App\Base\Model\Values\Identificatiors\Id;

use App\Base\Intable;
use App\Base\Model\Values\ValueObject;

interface IntId extends ValueObject, Intable
{
    public function get(): int;

    public function compare(IntId $id): bool;
}
