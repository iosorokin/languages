<?php

namespace App\Base\Entity\Timestamps;

use Illuminate\Support\Carbon;

interface HasTimestamps
{
    public function _setCreatedAt($value): self;

    public function getCreatedAt(): Carbon;

    public function _setUpdatedAt($value): self;

    public function getUpdatedAt(): Carbon;
}
