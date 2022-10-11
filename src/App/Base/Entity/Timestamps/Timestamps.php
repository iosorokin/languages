<?php

namespace App\Base\Entity\Timestamps;

use Illuminate\Support\Carbon;

trait Timestamps
{
    public function _setCreatedAt($value): self
    {
        $this->created_at = $value;

        return $this;
    }

    public function getCreatedAt(): Carbon
    {
        return $this->created_at;
    }

    public function _setUpdatedAt($value): self
    {
        $this->updated_at = $value;

        return $this;
    }

    public function getUpdatedAt(): Carbon
    {
        return $this->updated_at;
    }
}
