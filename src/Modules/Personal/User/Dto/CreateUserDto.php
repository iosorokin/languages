<?php

namespace Modules\Personal\User\Dto;

use Illuminate\Support\Arr;

final class CreateUserDto extends AbstractUserDto
{
    public static function new(array $attributes): self
    {
        $dto = new self();
        $dto->setName(Arr::get($attributes, 'name'));

        return $dto;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName()
        ];
    }
}
