<?php

declare(strict_types=1);

namespace Modules\Container\Services\Dispatcher\Exceptions;

use Exception;

final class ContainerNotFound extends Exception
{
    public function __construct(int $id)
    {
        $message = sprintf('Container with id %d not found', $id);

        parent::__construct($message);
    }
}
