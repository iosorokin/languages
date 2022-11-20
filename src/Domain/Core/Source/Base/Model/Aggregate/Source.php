<?php

namespace Domain\Core\Source\Base\Model\Aggregate;

use App\Base\Model\Values\Datetime\Timestamp;
use App\Base\Model\Values\Description\Description;
use App\Base\Model\Values\Identificatiors\Id\IntId;
use App\Base\Model\Values\Title\Title;
use Domain\Core\Language\Base\Model\Aggregate\Language;
use Domain\Core\Source\Base\Model\Value\SourceType;

interface Source
{
    public function id(): IntId;

    public function language(): Language;

    public function student(): IntId;

    public function title(): Title;

    public function description(): Description;

    public function type(): SourceType;

    public function createdAt(): Timestamp;
}
