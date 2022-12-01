<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Domain\Model\Aggregate;

use App\Education\Source\Shared\Domain\Model\Value\SourceType;
use App\Education\Source\Shared\Domain\Model\Value\SourceTypeImp;
use App\Education\Source\Student\Domain\Cases\Dto\CreateSourceDto;
use App\Education\Source\Student\Infrastructure\Database\SourceRepository;
use App\Education\Source\Student\Infrastructure\Database\Structure\WriteSourceStructure;
use Core\Base\Model\Entity;
use Core\Base\Model\Values\Datetime\Now;
use Core\Base\Model\Values\Datetime\Timestamp;
use Core\Base\Model\Values\Description\Description;
use Core\Base\Model\Values\Description\DescriptionImp;
use Core\Base\Model\Values\Identificatiors\Id\BigIntId;
use Core\Base\Model\Values\Identificatiors\Id\IntId;
use Core\Base\Model\Values\Identificatiors\Id\StrictNullId;
use Core\Base\Model\Values\Title\Title;
use Core\Base\Model\Values\Title\TitleImp;

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

    public static function create(CreateSourceDto $dto): Source
    {
        return new Source(
            id: StrictNullId::new(),
            studentId: BigIntId::new($dto->studentId),
            languageId: BigIntId::new($dto->languageId),
            title: TitleImp::new($dto->title),
            description: DescriptionImp::new($dto->description),
            type: SourceTypeImp::new($dto->type),
            createdAt: Now::new(),
        );
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

    public function toStructure(): WriteSourceStructure
    {
        return new WriteSourceStructure(
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
