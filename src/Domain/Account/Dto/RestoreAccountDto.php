<?php

declare(strict_types=1);

namespace Domain\Account\Dto;

use Carbon\Carbon;

final class RestoreAccountDto extends UserDto
{
    private int $id;

    private Carbon $createdAt;

    private bool $isRoot;

    private bool $isStudent;

    protected function __construct(array $attributes)
    {
        $this->id = $attributes['id'];
        $this->createdAt = $attributes['created_at'];
        $this->isRoot = $attributes['accesses']['is_root'];
        $this->isStudent = $attributes['accesses']['is_student'];

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

    public function isRoot(): bool
    {
        return $this->isRoot;
    }

    public function isStudent(): bool
    {
        return $this->isStudent;
    }
}

