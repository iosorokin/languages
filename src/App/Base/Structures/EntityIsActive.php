<?php

declare(strict_types=1);

namespace App\Base\Structures;

trait EntityIsActive
{
    use IsActiveAttributes;

    private bool $is_active;
}
