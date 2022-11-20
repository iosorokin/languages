<?php

namespace Domain\Core\Source\Student\Controll\Command;

interface CreateSource
{
    public function student(): int;

    public function language(): string;

    public function title(): string;

    public function description(): string;

    public function type(): string;
}
