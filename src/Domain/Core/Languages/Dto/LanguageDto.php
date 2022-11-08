<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Dto;

abstract class LanguageDto
{
    protected OwnerDto $owner;
    protected readonly string $name;
    protected readonly string $nativeName;
    protected readonly string $code;

    public function __construct(array $attributes)
    {
        $this->name = $attributes['name'];
        $this->nativeName = $attributes['native_name'];
        $this->code = $attributes['code'];
    }

    public function setOwner(int $ownerId): self
    {
        $this->owner = new OwnerDto($ownerId);

        return $this;
    }

    public function ownerId(): int
    {
        return $this->owner->id();
    }

    public function name(): string
    {
        return $this->name;
    }

    public function code(): string
    {
        return $this->code;
    }

    public function nativeName(): string
    {
        return $this->nativeName;
    }
}
