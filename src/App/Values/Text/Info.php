<?php

declare(strict_types=1);

namespace App\Values\Text;

final class Info
{
    public function __construct(
        private Title $title,
        private Description $description,
    ) {}

    public function title(): Title
    {
        return $this->title;
    }

    public function description(): Description
    {
        return $this->description;
    }
}
