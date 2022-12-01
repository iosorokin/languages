<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Domain\Cases;

use App\Education\Language\Shared\Policy\CanTakeToLearn;
use App\Education\Source\Student\Domain\Cases\Dto\CreateSourceDto;
use App\Education\Source\Student\Domain\Model\Aggregate\Source;
use App\Education\Source\Student\Infrastructure\Database\SourceRepository;

final class CreateSourceHandler
{
    public function __construct(
        private CanTakeToLearn $canLearnLanguage,
        private SourceRepository $sourceRepository,
    ) {}

    public function __invoke(CreateSourceDto $dto): Source
    {
        ($this->canLearnLanguage)($dto->languageId);
        $source = Source::new($dto);
        $source->commit($this->sourceRepository);

        return $source;
    }
}
