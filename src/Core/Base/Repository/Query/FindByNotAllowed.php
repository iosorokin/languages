<?php

declare(strict_types=1);

namespace Core\Base\Repository\Query;

use Exception;

final class FindByNotAllowed extends Exception
{
    public function __construct(mixed $find)
    {
        $message = sprintf(
            'Find by %s query not allowed',
            $find
        );

        parent::__construct($message);
    }
}
