<?php

declare(strict_types=1);

namespace Infrastructure\Services\Morph\Exceptions;

use Exception;

final class MorphNotFound extends Exception
{
    public function __construct(string|object $class)
    {
        $class = is_object($class) ? get_class($class) : $class;
        $message = sprintf('The class %s is missing in the map of morph relations', $class);

        parent::__construct($message);
    }
}
