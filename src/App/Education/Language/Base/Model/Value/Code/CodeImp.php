<?php

declare(strict_types=1);

namespace App\Education\Language\Base\Model\Value\Code;

use Core\Infrastructure\Packages\AssertStr;

final class CodeImp implements Code
{
    private const RULES = [
        'min' => 2,
        'max' => 4,
    ];

    private function __construct(
        private string $code,
    ) {}

    public static function new(string $name): Code
    {
        $vo = new self($name);
        $errors = $vo->validate();
        if ($errors) {
            return InvalidCode::new($errors);
        }

        return $vo;
    }

    private function validate(): array
    {
        $value = $this->get();
        if (AssertStr::min($value,self::RULES['min'])) {
            $errors[] = sprintf(
                'code.min.%d.receive.%d',
                self::RULES['min'],
                strlen($value)
            );
        }

        if (AssertStr::max($value,4)) {
            $errors[] = sprintf(
                'code.max.%d.receive.%d',
                self::RULES['max'],
                strlen($value)
            );
        }

        return $errors ?? [];
    }

    public function get(): string
    {
        return $this->code;
    }

    public function compare(Code $code): bool
    {
        return $this->get() === $code->get();
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
