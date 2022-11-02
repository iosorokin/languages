<?php

declare(strict_types=1);

namespace App\Values\Identificatiors\Id;

use Exception;

final class StrictNullId implements IntId
{
    private function __construct() {}

    public static function new(): self
    {
        return new self();
    }

    public function get(): never
    {
        throw new Exception('The null identifier cannot be called. First, set a specific identifier');
    }
}
