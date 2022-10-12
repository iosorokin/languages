<?php

namespace Modules\Domain\Languages\Structures;

use App\Base\Structures\HasIsActive;
use App\Base\Structures\Identify\HasIntId;
use App\Base\Structures\Structure;
use App\Base\Structures\Timestamps\HasTimestamps;
use Illuminate\Contracts\Support\Arrayable;
use Modules\Favorites\Contracts\Favoriteable;
use Modules\Personal\User\Structures\HasUser;

interface Language extends Structure,
    HasIntId,
    HasUser,
    HasTimestamps,
    HasIsActive,

    Favoriteable
{
    public function setName(string $name): self;

    public function getName(): string;

    public function setNativeName(string $name): self;

    public function getNativeName(): string;

    public function setCode(string $code): self;

    public function getCode(): string;
}
