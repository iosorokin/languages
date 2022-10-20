<?php

namespace App\Base\Structure\Timestamps;

use Illuminate\Support\Carbon;

trait Timestamps
{
    public function _setCreatedAt(Carbon $createdAt): self
    {
        $this->created_at = $createdAt;

        return $this;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function _setUpdatedAt(Carbon $updatedAt): self
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }
}
