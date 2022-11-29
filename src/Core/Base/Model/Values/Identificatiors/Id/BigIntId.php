<?php

declare(strict_types=1);

namespace Core\Base\Model\Values\Identificatiors\Id;

use Core\Infrastructure\Packages\AssertInt;

final class BigIntId implements IntId
{
    private function __construct(
        private int $id
    ) {}

    public static function new(int $id): IntId
    {
        $vo = new self($id);
        $errors = $vo->validate();
        if ($errors) {
            return InvalidObjectIntId::new($errors);
        }

        return $vo;
    }

    private function validate(): array
    {
        $value = $this->get();
        //todo вынести в конфиги
        if (AssertInt::min($value, 1)) {
            $errors[] = 'int.min.1';
        }
        //fixme убрать это
        if (AssertInt::max($value, 10000000000000)) {
            $errors[] = 'int.max.много';
        }

        return $errors ?? [];
    }

    public function get(): int
    {
        return $this->id;
    }

    public function toInt(): int
    {
        return $this->get();
    }

    public function compare(IntId $id): bool
    {
        return $this->toInt() === $id->toInt();
    }
}
