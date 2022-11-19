<?php

declare(strict_types=1);

namespace Infrastructure\Database\Structures\Language;

use Carbon\Carbon;
use Domain\Core\Language\Base\Model\Aggregate\Language;
use Domain\Core\Language\Base\Repository\Structure\LanguageStructure;

final class LanguageStructureImp implements LanguageStructure
{
    public function __construct(
        private readonly string $code,
        private readonly int $owner,
        private readonly string $name,
        private readonly string $nativeName,
        private readonly string $status,
        private readonly Carbon $createdAt,
    ){}

    public static function newFromArray(array $attributes): self
    {
        return new self(
            code: $attributes['code'],
            owner: $attributes['owner'],
            name: $attributes['name'],
            nativeName: $attributes['native_name'],
            status: $attributes['status'],
            createdAt: $attributes['created_at']
        );
    }

    public static function newFromEntity(Language $language): self
    {
        return new LanguageStructureImp(
            code: $language->code()->get(),
            owner: $language->owner()->get(),
            name: $language->name()->get(),
            nativeName: $language->nativeName()->get(),
            status: $language->status()->get(),
            createdAt: $language->createdAt()->get()
        );
    }

    public function code(): string
    {
        return $this->code;
    }

    public function owner(): int
    {
        return $this->owner;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function nativeName(): string
    {
        return $this->nativeName;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }
}
