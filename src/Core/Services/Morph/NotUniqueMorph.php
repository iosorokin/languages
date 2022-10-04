<?php

declare(strict_types=1);

namespace Core\Services\Morph;

use Exception;

final class NotUniqueMorph extends Exception
{
    public function __construct(string|object $class)
    {
        $class = is_object($class) ? get_class($class) : $class;
        $message = sprintf('More than one morph relation found for the class %s', $class);

        parent::__construct($message);
    }
}
