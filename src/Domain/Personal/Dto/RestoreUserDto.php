<?php

declare(strict_types=1);

namespace Domain\Personal\Dto;

use Carbon\Carbon;

final class RestoreUserDto extends UserDto
{
    private int $id;

    private Carbon $createdAt;

    private Carbon $updatedAt;

    protected function __construct(array $attributes)
    {
        $this->id = $attributes['id'];
        $this->createdAt = $attributes['created_at'];
        $this->updatedAt = $attributes['updated_at'];

        parent::__construct($attributes);
    }

    public static function new(array $attributes): self
    {
        return new self($attributes);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }
}
