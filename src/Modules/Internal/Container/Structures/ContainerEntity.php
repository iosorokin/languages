<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Structures;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Modules\Internal\Container\Contracts\Containerable;
use Modules\Internal\Container\Enums\ContainerType;

final class ContainerEntity implements Container
{
    private int $id;

    private Containerable $containerable;

    private ContainerType $type;

    private string $title;

    private string $description;

    private Collection $elements;

    private Carbon $created_at;

    private Carbon $updated_at;

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setContainerable(Containerable $containerable): self
    {
        $this->containerable = $containerable;

        return $this;
    }

    public function getContainerable(): Containerable
    {
        return $this->containerable;
    }

    public function setType(ContainerType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getType(): ContainerType
    {
        return $this->type;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getElements(): Collection
    {
        return $this->elements;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }
}
