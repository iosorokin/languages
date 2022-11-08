<?php

namespace Domain\Core\Languages\Model\Values\Text;

interface Title
{
    public function get(): ?string;

    public function compare(Description $title): bool;
}
