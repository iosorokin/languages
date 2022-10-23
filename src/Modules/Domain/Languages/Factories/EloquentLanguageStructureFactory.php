<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories;

use Modules\Domain\Languages\Factories\Builder\EloquentLanguageQueryBuilder;
use Modules\Domain\Languages\Factories\Builder\LanguageQueryBuilder;
use Modules\Domain\Languages\Factories\Structure\LanguageStructureFactory;
use Modules\Domain\Languages\Factories\Structure\ModelLanguageFactory;
use Modules\Domain\Languages\Repositories\EloquentLanguageRepository;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Domain\Languages\Structures\LanguageModel;

final class EloquentLanguageStructureFactory implements LanguageFactory
{
    public function builder(): LanguageQueryBuilder
    {
        return app()->make(EloquentLanguageQueryBuilder::class, [
            'query' => LanguageModel::query(),
        ]);
    }

    public function structure(): LanguageStructureFactory
    {
        return app()->make(ModelLanguageFactory::class);
    }

    public function repository(): LanguageRepository
    {
        return app()->make(EloquentLanguageRepository::class);
    }
}
