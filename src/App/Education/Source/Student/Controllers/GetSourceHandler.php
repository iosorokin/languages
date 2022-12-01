<?php

declare(strict_types=1);

namespace App\Education\Source\Student\Controllers;

use App\Controll\Source\Student\FindSourceImp;
use App\Education\Source\Student\Domain\Model\Aggregate\Source;
use App\Education\Source\Student\Domain\Model\Aggregate\Source;
use App\Education\Source\Student\Infrastructure\Database\SourceRepository;

final class GetSourceHandler
{
    public function __construct(
        private SourceRepository $repository,
    ) {}

    public function __invoke(FindSourceImp $query): Source
    {
        $sourceStructure = $this->repository->find($query);
        $source = Source::restore($sourceStructure);

        return $source;
    }
}
