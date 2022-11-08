<?php

namespace App\Values\Identificatiors\Id;

use App\Contracts\Intable;
use App\Values\ValueObject;

interface IntId extends ValueObject, Intable
{
    public function compare(IntId $id): bool;
}
