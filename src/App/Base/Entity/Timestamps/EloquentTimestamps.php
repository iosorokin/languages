<?php

namespace App\Base\Entity\Timestamps;

use Illuminate\Support\Carbon;

trait EloquentTimestamps
{
    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }
}
