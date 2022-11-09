<?php

namespace App\Values\Title;

use App\Values\Description\Description;

interface Title
{
    public function get(): ?string;

    public function compare(Description $title): bool;
}
