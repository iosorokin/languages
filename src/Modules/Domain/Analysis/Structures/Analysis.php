<?php

namespace Modules\Domain\Analysis\Structures;

use App\Base\Structures\HasDescription;
use App\Base\Structures\Identify\HasIntId;
use App\Base\Structures\Timestamps\HasTimestamps;
use Modules\Domain\Sentences\Structures\HasSentence;
use Modules\Personal\User\Structures\HasUser;

interface Analysis extends
    HasIntId,
    HasDescription,
    HasTimestamps,
    HasSentence,
    HasUser
{
    public function setTranslate(string $translate): self;

    public function getTranslate(): string;
}
