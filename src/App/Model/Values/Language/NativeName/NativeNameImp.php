<?php

declare(strict_types=1);

namespace App\Model\Values\Language\NativeName;

use Infrastructure\Packages\AssertStr;

final class NativeNameImp implements NativeName
{
    private const RULES = [
        'min' => 2,
        'max' => 32,
    ];

    private function __construct(
        private string $code,
    ) {}

    public static function new(string $code): NativeName
    {
        $vo = new self($code);
        $errors = $vo->validate();
        if ($errors) {
            return InvalidNativeName::new($errors);
        }

        return $vo;
    }

    private function validate(): array
    {
        $value = $this->get();
        if (AssertStr::min($value, self::RULES['min'])) {
            $errors[] = sprintf(
                'native_name.min.%d.receive.%d',
                self::RULES['min'],
                strlen($value)
            );
        }

        if (AssertStr::max($value, self::RULES['max'])) {
            $errors[] = sprintf(
                'native_name.max.%d.receive.%d',
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

    public function compare(NativeName $nativeName): bool
    {
        return $this->get() === $nativeName->get();
    }

    public function __toString(): string
    {
        return $this->get();
    }
}
