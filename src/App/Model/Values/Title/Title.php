<?php

namespace App\Model\Values\Title;

use App\Model\Values\Description\Description;

interface Title
{
    public function get(): ?string;

    public function compare(Description $title): bool;
}
