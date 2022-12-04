<?php

declare(strict_types=1);

namespace Core\Infrastructure\Query;

interface FindSource
{
    public function get(): mixed;
}
