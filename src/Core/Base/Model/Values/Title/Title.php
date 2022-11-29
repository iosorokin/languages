<?php

namespace Core\Base\Model\Values\Title;

use Core\Base\Model\Values\Description\Description;

interface Title
{
    public function get(): ?string;

    public function compare(Description $title): bool;
}
