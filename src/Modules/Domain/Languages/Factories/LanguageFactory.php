<?php

namespace Modules\Domain\Languages\Factories;

use Modules\Domain\Languages\Factories\Builder\LanguageQueryBuilder;
use Modules\Domain\Languages\Factories\Structure\LanguageStructureFactory;
use Modules\Domain\Languages\Repositories\LanguageRepository;

interface LanguageFactory
{
    public function structure(): LanguageStructureFactory;

    public function builder():  LanguageQueryBuilder;

    public function repository(): LanguageRepository;
}
