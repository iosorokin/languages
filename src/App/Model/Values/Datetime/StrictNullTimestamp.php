<?php

declare(strict_types=1);

namespace App\Model\Values\Datetime;

use Exception;

final class StrictNullTimestamp implements Timestamp
{
    private function __construct() {}

    public static function new(): self
    {
        return new self();
    }

    public function get(): never
    {
        throw new Exception('The null timestamp cannot be called. First, set a specific timestamp');
    }
}
