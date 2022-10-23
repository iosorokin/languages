<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Factories;

use Modules\Domain\Sources\Factories\Structure\ModelSourceFactory;
use Modules\Domain\Sources\Factories\Structure\SourceStructureFactory;
use Modules\Domain\Sources\Queries\Builder\EloquentSourceQueryBuilder;
use Modules\Domain\Sources\Queries\Builder\SourceQueryBuilder;
use Modules\Domain\Sources\Repositories\EloquentSourceRepository;
use Modules\Domain\Sources\Repositories\SourceRepository;

final class EloquentSourceFactory implements SourceFactory
{
    public function structure(): SourceStructureFactory
    {
        return app()->make(ModelSourceFactory::class);
    }

    public function repository(): SourceRepository
    {
        return app()->make(EloquentSourceRepository::class);
    }

    public function builder(): SourceQueryBuilder
    {
        return app()->make(EloquentSourceQueryBuilder::class);
    }
}
