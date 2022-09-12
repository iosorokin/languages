<?php

namespace App\Contracts\Contexts;

use App\Contracts\Structures\AuthableStructure;

interface Client
{
    public function getStructure(): ?AuthableStructure;
}
