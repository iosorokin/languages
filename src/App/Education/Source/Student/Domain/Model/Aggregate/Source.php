<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Domain\Model\Aggregate;

use App\Education\Source\Shared\Domain\Model\Value\SourceType;
use App\Education\Source\Student\Domain\Cases\Dto\CreateSourceDto;
use App\Education\Source\Student\Domain\Cases\Dto\UpdateSourceDto;
use App\Education\Source\Student\Infrastructure\Database\SourceRepository;
use App\Education\Source\Student\Infrastructure\Database\Structure\SourceStructure;
use Core\Base\Model\Entity;
use Core\Base\Model\Values\Datetime\Now;
use Core\Base\Model\Values\Datetime\Timestamp;
use Core\Base\Model\Values\Description\Description;
use Core\Base\Model\Values\Identificatiors\Id\IntId;
use Core\Base\Model\Values\Identificatiors\Id\StrictNullId;
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

    public static function new(CreateSourceDto $dto): Source
    {
        return new Source(
            id: StrictNullId::new(),
            studentId: $dto->studentId,
            languageId: $dto->languageId,
            title: $dto->title,
            description: $dto->description,
            type: $dto->type,
            createdAt: Now::new(),
        );
    }

    public static function update(UpdateSourceDto $dto, SourceStructure $structure)
    {

    }

    public function id(): IntId
    {
        return $this->id;
    }

    public function changeTitle(Title $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function changeDescription(Description $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function changeType(SourceType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function commit(SourceRepository $repository): void
    {
        $this->id = $repository->generateId();
        $repository->add($this->toStructure());
    }

    public function toStructure(): SourceStructure
    {
        return new SourceStructure(
            id: $this->id,
            languageId: $this->languageId,
            studentId: $this->studentId,
            title: $this->title,
            description: $this->description,
            type: $this->type,
            createdAt: $this->createdAt,
        );
    }
}
