<?php

namespace App\Base\Model\Roles;

use App\Base\Model\Values\Identificatiors\Id\IntId;

interface Student
{
    public function id(): IntId;
}
