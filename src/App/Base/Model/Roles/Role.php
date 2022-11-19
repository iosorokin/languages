<?php

namespace App\Base\Model\Roles;

use App\Base\Model\Values\Identificatiors\Id\IntId;

interface Role
{
    public function id(): IntId;
}
