<?php

namespace App\Database\Personal\Providers;

use Illuminate\Support\Carbon;

interface UserDataProvider
{
    public function getId(): int;

    public function getName(): string;

    public function getRoles(): array;

    public function getCreatedAt(): Carbon;

    public function getUpdatedAt(): Carbon;

    public function hasBaseAuth(): bool;

    public function getEmail(): string;

    public function getPassword(): string;
}
