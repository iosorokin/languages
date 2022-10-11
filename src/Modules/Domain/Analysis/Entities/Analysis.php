<?php

namespace Modules\Domain\Analysis\Entities;

use App\Base\Entity\HasDescription;
use App\Base\Entity\Identify\HasIntId;
use App\Base\Entity\Timestamps\HasTimestamps;
use Modules\Domain\Sentences\Entities\HasSentence;
use Modules\Personal\User\Entities\HasUser;

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
