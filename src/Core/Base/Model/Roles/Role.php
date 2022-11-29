<?php

namespace Core\Base\Model\Roles;

use Core\Base\Model\Values\Identificatiors\Id\IntId;

interface Role
{
    public function id(): IntId;
}
