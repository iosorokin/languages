<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Model\Aggregate;

use App\Base\Model\Values\Datetime\Now;
use App\Base\Model\Values\Description\DescriptionImp;
use App\Base\Model\Values\Identificatiors\Id\BigIntId;
use App\Base\Model\Values\Identificatiors\Id\StrictNullId;
use App\Base\Model\Values\Title\TitleImp;
use Domain\Core\Source\Student\Controll\Command\StudentCreateSource;
use Domain\Core\Source\Student\Model\Value\SourceTypeImp;
use Domain\Core\Source\Student\Repository\StudentSourceLanguageRepository;

final class StudentSourceFactory
{
    public function __construct(
        private StudentSourceLanguageRepository $languageRepository,
    ) {}

    public function create(StudentCreateSource $command): StudentSource
    {
        $languageId = BigIntId::new($command->language());
        $language = $this->languageRepository->find($languageId);

        return new StudentSource(
            id: StrictNullId::new(),
            student: BigIntId::new($command->student()),
            language: $language,
            title: TitleImp::new($command->title()),
            description: DescriptionImp::new($command->description()),
            type: SourceTypeImp::new($command->type()),
            createdAt: Now::new(),
        );
    }
}
