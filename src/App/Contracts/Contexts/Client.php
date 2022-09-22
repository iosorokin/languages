<?php

namespace App\Contracts\Contexts;

use Modules\Personal\Auth\Structures\AuthableStructure;

interface Client
{
    public function getStructure(): ?AuthableStructure;
}
