<?php

namespace Modules\Languages\Entity;

use Illuminate\Support\Carbon;
use Modules\Personal\User\Entities\User;

interface Language
{
    public function getId(): int;

    public function setUser(User $user): self;

    public function getUser(): User;

    public function setName(string $name): self;

    public function getName(): string;

    public function setNativeName(string $name): self;

    public function getNativeName(): string;

    public function setCode(string $code): self;

    public function getCode(): string;

    public function getCreatedAt(): Carbon;

    public function getUpdatedAt(): Carbon;
}
