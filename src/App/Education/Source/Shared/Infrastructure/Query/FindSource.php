<?php

declare(strict_types=1);

namespace App\Education\Source\Shared\Infrastructure\Query;

interface FindSource
{
    public function get(): mixed;
}
