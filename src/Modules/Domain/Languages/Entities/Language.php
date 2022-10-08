<?php

namespace Modules\Domain\Languages\Entities;

use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Favorites\Contracts\Favoriteable;
use Modules\Personal\User\Entities\HasUser;

interface Language extends
    HasIntId,
    HasUser,
    HasTimestamps,

    Favoriteable
{
    public function setName(string $name): self;

    public function getName(): string;

    public function setNativeName(string $name): self;

    public function getNativeName(): string;

    public function setCode(string $code): self;

    public function getCode(): string;
}
