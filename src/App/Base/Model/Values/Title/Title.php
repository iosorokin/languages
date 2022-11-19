<?php

namespace App\Base\Model\Values\Title;

use App\Base\Model\Values\Description\Description;

interface Title
{
    public function get(): ?string;

    public function compare(Description $title): bool;
}
