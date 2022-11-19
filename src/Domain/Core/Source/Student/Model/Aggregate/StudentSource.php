<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Model\Aggregate;

use App\Base\Model\Entity;
use App\Base\Model\Values\Datetime\Timestamp;
use App\Base\Model\Values\Description\Description;
use App\Base\Model\Values\Identificatiors\Id\IntId;
use App\Base\Model\Values\Title\Title;
use Domain\Core\Source\Student\Model\Entity\StudentSourceLanguage;
use Domain\Core\Source\Student\Model\Value\SourceType;
use Domain\Core\Source\Student\Policy\CanLearnLanguage;
use Domain\Core\Source\Student\Repository\StudentSourceRepository;

final class StudentSource extends Entity
{
    public function __construct(
        private IntId                 $id,
        private IntId                 $student,
        private StudentSourceLanguage $language,
        private Title                 $title,
        private Description           $description,
        private SourceType            $type,
        private Timestamp             $createdAt,
    ) {
        (new CanLearnLanguage())($this->language);
    }

    public function id(): IntId
    {
        return clone $this->id;
    }

    public function language(): StudentSourceLanguage
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

    public function changeTitle(Title $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function description(): Description
    {
        return clone $this->description;
    }

    public function changeDescription(Description $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function type(): SourceType
    {
        return clone $this->type;
    }

    public function changeType(SourceType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function createdAt(): Timestamp
    {
        return clone $this->createdAt;
    }

    public function commit(StudentSourceRepository $repository): self
    {
        $this->id = $repository->add($this);

        return $this;
    }
}
