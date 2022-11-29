<?php

declare(strict_types=1);

namespace Core\Base\Model\Values\Title;

use Core\Base\Model\Values\Description\Description;

final class TitleImp implements Title
{
    private function __construct(
        private string $title
    ) {}

    public static function new(string $title): self
    {
        return new self($title);
    }

    public function compare(Description $title): bool
    {
        return $this->get() === $title->get();
    }

    public function get(): string
    {
        return $this->title;
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
