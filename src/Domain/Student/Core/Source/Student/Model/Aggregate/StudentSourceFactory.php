<?php

declare(strict_types=1);

namespace Domain\Student\Core\Source\Student\Model\Aggregate;

use App\Model\Values\Datetime\Now;
use App\Model\Values\Description\DescriptionImp;
use App\Model\Values\Identificatiors\Id\BigIntId;
use App\Model\Values\Identificatiors\Id\StrictNullId;
use App\Model\Values\Title\TitleImp;
use Domain\Base\Core\Language\Policy\CanLearnLanguage;
use Domain\Student\Core\Source\Student\Controll\Command\StudentCreateSource;

final class StudentSourceFactory
{
    public function __construct(
        private CanLearnLanguage $canLearnLanguage,
    ) {}

    public function create(StudentCreateSource $command): StudentSource
    {
        ($this->canLearnLanguage)(BigIntId::new($command->language()));

        return new StudentSource(
            id: StrictNullId::new(),
            student: BigIntId::new($command->student()),
            language: BigIntId::new($command->language()),
            title: TitleImp::new($command->title()),
            description: DescriptionImp::new($command->description()),
            createdAt: Now::new(),
        );
    }
}
