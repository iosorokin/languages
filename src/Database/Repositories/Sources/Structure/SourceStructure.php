<?php

declare(strict_types=1);

namespace Domain\Education\Source\Student\Infrastructure\Database\Structure;

use Core\Base\Database\Structure;
use Core\Base\Model\Values\Datetime\Timestamp;
use Core\Base\Model\Values\Description\Description;
use Core\Base\Model\Values\Identificatiors\Id\IntId;
use Core\Base\Model\Values\Title\Title;
use Core\Domain\Models\Value\SourceType;

final class SourceStructure extends Structure
{
    public function __construct(
        public readonly IntId $id,
        public readonly IntId $languageId,
        public readonly IntId $studentId,
        public readonly Title $title,
        public readonly Description $description,
        public readonly SourceType $type,
        public readonly Timestamp $createdAt,
    ) {}
}
