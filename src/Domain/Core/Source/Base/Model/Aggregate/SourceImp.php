<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Model\Aggregate;

use App\Base\Model\Entity;
use App\Base\Model\Values\Datetime\Now;
use App\Base\Model\Values\Datetime\Timestamp;
use App\Base\Model\Values\Description\Description;
use App\Base\Model\Values\Description\DescriptionImp;
use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use App\Base\Model\Values\Identificatiors\Id\IntId;
use App\Base\Model\Values\Identificatiors\Id\StrictNullId;
use App\Base\Model\Values\Title\Title;
use App\Base\Model\Values\Title\TitleImp;
use App\Base\Policy\Language\CanLearnLanguage;
use Domain\Core\Language\Base\Model\Aggregate\Language;
use Domain\Core\Language\Base\Model\Aggregate\LanguageFactory;
use Domain\Core\Source\Base\Model\Value\SourceType;
use Domain\Core\Source\Base\Model\Value\SourceTypeImp;
use Domain\Core\Source\Base\Repository\Structure\SourceStructure;
use Domain\Core\Source\Student\Controll\Command\CreateSource;

final class SourceImp extends Entity implements Source
{
    private function __construct(
        private IntId       $id,
        private IntId       $student,
        private Language    $language,
        private Title       $title,
        private Description $description,
        private SourceType  $type,
        private Timestamp   $createdAt,
    ) {}

    public static function restore(SourceStructure $structure): Source
    {
        return new SourceImp(
            id: StrictNullId::new(),
            student: BigIntId::new($structure->student()),
            language: LanguageFactory::restore($structure->language()),
            title: TitleImp::new($structure->title()),
            description: DescriptionImp::new($structure->description()),
            type: SourceTypeImp::new($structure->type()),
            createdAt: Now::new(),
        );
    }

    public static function create(Language $language, CreateSource $command): Source
    {
        (new CanLearnLanguage())($language);

        return new SourceImp(
            id: StrictNullId::new(),
            student: BigIntId::new($command->student()),
            language: $language,
            title: TitleImp::new($command->title()),
            description: DescriptionImp::new($command->description()),
            type: SourceTypeImp::new($command->type()),
            createdAt: Now::new(),
        );
    }

    public function id(): IntId
    {
        return clone $this->id;
    }

    public function language(): Language
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
}
