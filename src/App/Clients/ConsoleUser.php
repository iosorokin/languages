<?php

declare(strict_types=1);

namespace App\Clients;

use App\Contracts\Contexts\Client;
use Modules\Personal\Auth\Entity\AuthableStructure;

final class ConsoleUser implements Client
{
    public function user(): ?AuthableStructure
    {
        return null;
    }
}
