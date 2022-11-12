<?php

namespace App\Model\Roles;

use App\Model\Values\Identificatiors\Id\IntId;

interface Student
{
    public function id(): IntId;
}
