<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Model\Values\Text;

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
