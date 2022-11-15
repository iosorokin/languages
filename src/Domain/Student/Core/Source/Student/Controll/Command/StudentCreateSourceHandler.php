<?php

declare(strict_types=1);

namespace Domain\Student\Core\Source\Student\Controll\Command;

use App\Model\Values\Identificatiors\Id\IntId;
use Domain\Student\Core\Source\Student\Model\Aggregate\StudentSourceFactory;
use Domain\Student\Core\Source\Student\Repository\StudentSourceRepository;

final class StudentCreateSourceHandler
{
    public function __construct(
        private StudentSourceFactory $factory,
        private StudentSourceRepository $repository,
    ) {}

    public function __invoke(StudentCreateSource $command): IntId
    {
        $source = $this->factory->create($command);
        $id = $this->repository->add($source);

        return $id;
    }
}
