<?php

declare(strict_types=1);

namespace Domain\Core\Source\Student\Controll\Command;

use App\Base\Model\Values\Identificatiors\Id\IntId;
use App\Controll\Source\Student\CreateSourceImp;
use Domain\Core\Source\Base\Model\Aggregate\SourceFactory;
use Domain\Core\Source\Base\Repository\SourceRepository;

final class CreateSourceHandler
{
    public function __construct(
        private SourceFactory    $factory,
        private SourceRepository $sourceRepository,
    ) {}

    public function __invoke(CreateSourceImp $command): IntId
    {
        $source = $this->factory->create($command);
        $source->commit($this->sourceRepository);

        return $source->id();
    }
}
