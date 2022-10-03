<?php

namespace App\Base\Entity\Timestamps;

use Illuminate\Support\Carbon;

interface HasTimestamps
{
    public function getCreatedAt(): Carbon;

    public function getUpdatedAt(): Carbon;
}
