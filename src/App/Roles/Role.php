<?php

namespace App\Roles;

use App\Values\Identificatiors\Id\IntId;

interface Role
{
    public function id(): IntId;

    public function isRoot(): bool;
}
