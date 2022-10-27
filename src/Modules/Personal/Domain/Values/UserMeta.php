<?php

declare(strict_types=1);

namespace Modules\Personal\Domain\Values;

use App\Values\Datetime\Timestamp;

final class UserMeta
{
    private Timestamp $createdAt;
    private Timestamp $updatedAt;

    public function __construct(
        Timestamp $createdAt,
        Timestamp $updatedAt,
    ) {
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    public function createdAt(): Timestamp
    {
        return $this->createdAt;
    }

    public function updatedAt(): Timestamp
    {
        return $this->updatedAt;
    }
}
