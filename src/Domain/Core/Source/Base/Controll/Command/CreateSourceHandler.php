<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Controll\Command;

use App\Base\Model\Values\Identificatiors\Id\IntId;
use Domain\Core\Source\Base\Model\Aggregate\StudentSourceFactory;
use Domain\Core\Source\Base\Repository\StudentSourceRepository;

final class CreateSourceHandler
{
    public function __construct(
        private StudentSourceFactory $factory,
        private StudentSourceRepository $sourceRepository,
    ) {}

    public function __invoke(CreateSourceImp $command): IntId
    {
        $source = $this->factory->create($command);
        $source->commit($this->sourceRepository);

        return $source->id();
    }
}
