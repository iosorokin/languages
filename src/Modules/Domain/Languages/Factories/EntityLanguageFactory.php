<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Factories;

use Illuminate\Support\Facades\DB;
use Modules\Domain\Languages\Factories\Builder\EntityLanguageQueryBuilder;
use Modules\Domain\Languages\Factories\Builder\LanguageQueryBuilder;
use Modules\Domain\Languages\Factories\Structure\EntityLanguageStructureFactory;
use Modules\Domain\Languages\Factories\Structure\LanguageStructureFactory;
use Modules\Domain\Languages\Repositories\Entities\EntityLanguageRepository;
use Modules\Domain\Languages\Repositories\LanguageRepository;

final class EntityLanguageFactory implements LanguageFactory
{
    public function builder(): LanguageQueryBuilder
    {
        return app()->make(EntityLanguageQueryBuilder::class, [
            'query' => DB::table('languages'),
        ]);
    }

    public function structure(): LanguageStructureFactory
    {
        return app()->make(EntityLanguageStructureFactory::class);
    }

    public function repository(): LanguageRepository
    {
        return app()->make(EntityLanguageRepository::class);
    }
}
