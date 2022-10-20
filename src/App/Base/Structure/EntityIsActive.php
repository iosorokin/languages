<?php

declare(strict_types=1);

namespace App\Base\Structure;

trait EntityIsActive
{
    use IsActiveAttributes;

    private bool $is_active;
}
