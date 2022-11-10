<?php

namespace App\Model\Values\Identificatiors\Id;

use App\Contracts\Intable;
use App\Model\Values\ValueObject;

interface IntId extends ValueObject, Intable
{
    public function compare(IntId $id): bool;
}
