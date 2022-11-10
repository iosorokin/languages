<?php

namespace App\Model\Roles;

use App\Model\Values\Identificatiors\Id\IntId;

interface Role
{
    public function id(): IntId;

    public function isRoot(): bool;
}
