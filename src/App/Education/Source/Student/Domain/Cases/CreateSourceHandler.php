<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Domain\Cases;

use App\Education\Language\Shared\Policy\CanTakeToLearn;
use App\Education\Source\Student\Domain\Cases\Dto\CreateSourceDto;
use App\Education\Source\Student\Domain\Model\Aggregate\SourceFactory;
use App\Education\Source\Student\Infrastructure\Database\SourceRepository;
use Core\Base\Model\Values\Identificatiors\Id\IntId;

final class CreateSourceHandler
{
    public function __construct(
        private CanTakeToLearn $canLearnLanguage,
        private SourceRepository $sourceRepository,
    ) {}

    public function __invoke(CreateSourceDto $dto): IntId
    {
        ($this->canLearnLanguage)($dto->languageId);
        $source = SourceFactory::create($dto);
        $source->commit($this->sourceRepository);

        return $source->id();
    }
}
