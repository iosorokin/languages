<?php

namespace App\Base\Structure\Timestamps;

use Illuminate\Support\Carbon;

interface HasTimestamps
{
    public function _setCreatedAt(Carbon $createdAt): self;

    public function getCreatedAt(): Carbon;

    public function _setUpdatedAt(Carbon $updatedAt): self;

    public function getUpdatedAt(): Carbon;
}
