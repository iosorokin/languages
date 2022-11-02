<?php

declare(strict_types=1);

namespace App\Values\Datetime;

final class DefaultTimestamps
{
    private Timestamp $createdAt;

    private Timestamp $updatedAt;

    private function __construct() {}

    public static function new(Timestamp $createdAt, Timestamp $updatedAt): self
    {
        $timestamp = new static();
        $timestamp->setCreatedAt($createdAt);
        $timestamp->setUpdatedAt($updatedAt);

        return $timestamp;
    }

    public function setCreatedAt(Timestamp $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function createdAt(): Timestamp
    {
        return $this->createdAt;
    }

    public function setUpdatedAt(Timestamp $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getUpdatedAt(): Timestamp
    {
        return $this->updatedAt;
    }
}
