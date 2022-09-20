<?php

declare(strict_types=1);

namespace App\Clients;

use App\Contracts\Contexts\Client;
use App\Contracts\Structures\AuthableStructure;

final class ConsoleUser implements Client
{
    public function getStructure(): ?AuthableStructure
    {
        return null;
    }
}
