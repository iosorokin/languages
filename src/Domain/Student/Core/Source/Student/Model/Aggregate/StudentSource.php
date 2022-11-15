<?php

declare(strict_types=1);

namespace Domain\Student\Core\Source\Student\Model\Aggregate;

use App\Base\Model\Entity;
use App\Model\Values\Datetime\Timestamp;
use App\Model\Values\Description\Description;
use App\Model\Values\Identificatiors\Id\IntId;
use App\Model\Values\Title\Title;
use Domain\Student\Core\Source\Student\Model\Value\SourceType;

final class StudentSource extends Entity
{
    public function __construct(
        private IntId       $id,
        private IntId       $student,
        private IntId       $language,
        private Title       $title,
        private Description $description,
        private SourceType  $type,
        private Timestamp   $createdAt,
    ) {}

    public function id(): IntId
    {
        return clone $this->id;
    }

    public function language(): IntId
    {
        return clone $this->language;
    }

    public function student(): IntId
    {
        return clone $this->student;
    }

    public function title(): Title
    {
        return clone $this->title;
    }

    public function description(): Description
    {
        return clone $this->description;
    }

    public function type(): SourceType
    {
        return clone $this->type;
    }

    public function createdAt(): Timestamp
    {
        return clone $this->createdAt;
    }
}
