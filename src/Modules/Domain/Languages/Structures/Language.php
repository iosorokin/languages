<?php

namespace Modules\Domain\Languages\Structures;

use App\Base\Structure\HasIsActive;
use App\Base\Structure\Identify\HasIntId;
use App\Base\Structure\Structure;
use App\Base\Structure\Timestamps\HasTimestamps;
use Modules\Internal\Favorites\Contracts\Favoriteable;
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
