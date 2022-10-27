<?php

declare(strict_types=1);

namespace App\Values\Identificatiors;

use Exception;

final class StrictNullId implements IntId
{
    public function value(): never
    {
        throw new Exception('The null identifier cannot be called. First, set a specific identifier');
    }
}
