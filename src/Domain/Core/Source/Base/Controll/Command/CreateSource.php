<?php

namespace Domain\Core\Source\Base\Controll\Command;

interface CreateSource
{
    public function student(): int;

    public function language(): int;

    public function title(): string;

    public function description(): string;

    public function type(): string;
}
