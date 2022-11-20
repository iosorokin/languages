<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Model\Aggregate;

use App\Base\Model\Values\Datetime\Timestamp;
use App\Base\Model\Values\Description\Description;
use App\Base\Model\Values\Identificatiors\Id\IntId;
use App\Base\Model\Values\Title\Title;
use Domain\Core\Language\Base\Model\Aggregate\Language;
use Domain\Core\Source\Base\Model\Aggregate\SourceImp;
use Domain\Core\Source\Base\Model\Value\SourceType;

final class StudentSourceImp implements StudentSource
{
    public function __construct(
        private SourceImp $source,
    ) {}

    public function id(): IntId
    {
        return $this->source->id();
    }

    public function student(): IntId
    {
        return $this->source->student();
    }

    public function language(): Language
    {
        return $this->source->language();
    }

    public function title(): Title
    {
        return $this->source->title();
    }

    public function description(): Description
    {
        return $this->source->description();
    }

    public function type(): SourceType
    {
        return $this->source->type();
    }

    public function createdAt(): Timestamp
    {
        return $this->source->createdAt();
    }

    public function changeTitle(Title $title): self
    {
        $this->source->changeTitle($title);

        return $this;
    }

    public function changeDescription(Description $description): self
    {
        $this->source->changeDescription($description);

        return $this;
    }

    public function changeType(SourceType $type): self
    {
        $this->source->changeType($type);

        return $this;
    }
}
