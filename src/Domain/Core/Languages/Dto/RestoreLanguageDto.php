<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Dto;

use Carbon\Carbon;

final class RestoreLanguageDto extends LanguageDto
{
    private int $id;

    private Carbon $createdAt;

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);

        $this->id = $attributes['id'];
        $this->createdAt = $attributes['created_at'];
    }

    public function id(): int
    {
        return $this->id;
    }

    public function createdAt(): Carbon
    {
        return $this->createdAt;
    }
}
