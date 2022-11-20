<?php

namespace Domain\Core\Source\Student\Model\Aggregate;

use App\Base\Model\Values\Description\Description;
use App\Base\Model\Values\Title\Title;
use Domain\Core\Source\Base\Model\Aggregate\Source;
use Domain\Core\Source\Base\Model\Value\SourceType;

interface StudentSource extends Source
{
    public function changeTitle(Title $title): self;

    public function changeDescription(Description $description): self;

    public function changeType(SourceType $type): self;
}
