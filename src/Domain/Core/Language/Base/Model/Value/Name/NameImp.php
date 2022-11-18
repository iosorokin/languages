<?php

declare(strict_types=1);

namespace Domain\Core\Language\Base\Model\Value\Name;

use Infrastructure\Packages\AssertStr;

final class NameImp implements Name
{
    private const RULES = [
        'min' => 2,
        'max' => 32,
    ];

    private function __construct(
        private string $name,
    ) {}

    public static function new(string $name): Name
    {
        $vo = new self($name);
        $errors = $vo->validate();
        if ($errors) {
            return InvalidName::new($errors);
        }

        return $vo;
    }

    private function validate(): array
    {
        $value = $this->get();
        if (AssertStr::min($value, self::RULES['min'])) {
            $errors[] = sprintf(
                'name.min.%d.receive.%d',
                self::RULES['min'],
                strlen($value)
            );
        }
        if (AssertStr::max($value, self::RULES['max'])) {
            $errors[] = sprintf(
                'name.max.%d.receive.%d',
                self::RULES['max'],
                strlen($value)
            );
        }

        return $errors ?? [];
    }

    public function get(): string
    {
        return $this->name;
    }

    public function compare(Name $name): bool
    {
        return $this->get() === $name->get();
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
