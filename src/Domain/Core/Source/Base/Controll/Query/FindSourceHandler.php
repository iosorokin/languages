<?php

declare(strict_types=1);

namespace Domain\Core\Source\Base\Controll\Query;

use App\Controll\Source\Student\FindSourceImp;
use Domain\Core\Source\Base\Model\Aggregate\Source;
use Domain\Core\Source\Base\Model\Aggregate\SourceImp;
use Domain\Core\Source\Base\Repository\SourceRepository;

final class FindSourceHandler
{
    public function __construct(
        private SourceRepository $repository,
    ) {}

    public function __invoke(FindSourceImp $query): Source
    {
        $sourceStructure = $this->repository->find($query);
        $source = SourceImp::restore($sourceStructure);

        return $source;
    }
}
