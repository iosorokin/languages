<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Controll\Command;

use App\Model\Values\Identificatiors\Id\IntId;
use Domain\Core\Source\Student\Model\Aggregate\StudentSourceFactory;
use Domain\Core\Source\Student\Repository\StudentSourceRepository;

final class StudentCreateSourceHandler
{
    public function __construct(
        private StudentSourceFactory $factory,
        private StudentSourceRepository $sourceRepository,
    ) {}

    public function __invoke(StudentCreateSource $command): IntId
    {
        $source = $this->factory->create($command);
        $source->commit($this->sourceRepository);

        return $source->id();
    }
}
