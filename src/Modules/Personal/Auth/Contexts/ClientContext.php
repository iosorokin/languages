<?php

namespace Modules\Personal\Auth\Contexts;

use App\Contracts\Contexts\Client;
use Modules\Personal\Auth\Structures\AuthableStructure;

class ClientContext implements Client
{
    public function __construct(
        public readonly ?AuthableStructure $structure = null
    ) {}

    public function getStructure(): ?AuthableStructure
    {
        return $this->structure;
    }
}
