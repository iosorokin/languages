<?php

declare(strict_types=1);

namespace App\Dto\Language;

use Carbon\Carbon;
use Domain\Core\Languages\Repositories\RestoreLanguageDto;

final class RestoreLanguage extends Language implements RestoreLanguageDto
{
    private int $id;

    private int $owner;

    private bool $isActive;

    private Carbon $createdAt;

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);

        $this->id = $attributes['id'];
        $this->owner = $attributes['owner'];
        $this->isActive = $attributes['is_active'];
        $this->createdAt = $attributes['created_at'];
    }

    public function id(): int
    {
        return $this->id;
    }

    public function owner(): int
    {
        return $this->owner;
    }

    public function isActive(): bool
    {
        return $this->isActive;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }
}
