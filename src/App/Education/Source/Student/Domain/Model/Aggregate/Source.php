<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Domain\Model\Aggregate;

use App\Education\Source\Student\Domain\Model\Value\SourceType;
use App\Education\Source\Student\Infrastructure\Database\SourceRepository;
use Core\Base\Model\Entity;
use Core\Base\Model\Values\Datetime\Timestamp;
use Core\Base\Model\Values\Description\Description;
use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Core\Base\Model\Values\Identificatiors\Id\IntId;
use Core\Base\Model\Values\Title\Title;

final class Source extends Entity
{
    public function __construct(
        private IntId       $id,
        private IntId       $studentId,
        private IntId       $languageId,
        private Title       $title,
        private Description $description,
        private SourceType  $type,
        private Timestamp   $createdAt,
    ) {}

    public function id(): IntId
    {
        return clone $this->id;
    }

    public function languageId(): IntId
    {
        return $this->languageId;
    }

    public function studentId(): IntId
    {
        return clone $this->studentId;
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

    public function commit(SourceRepository $repository): IntId
    {
        return BigIntId::new($repository->add($this));
    }
}
