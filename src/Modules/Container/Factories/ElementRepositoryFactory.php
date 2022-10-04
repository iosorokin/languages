<?php

declare(strict_types=1);

namespace Modules\Container\Factories;

use Modules\Container\Enums\ElementType;
use Modules\Container\Repositories\ContainerRepository;
use Modules\Education\Rules\Repositories\RuleRepository;
use Modules\Education\Sentences\Repositories\SentenceRepository;

final class ElementRepositoryFactory
{
    public function createFromType(string $type): RuleRepository|SentenceRepository|ContainerRepository
    {
        return match (true) {
            $type === ElementType::Rule->value => app(RuleRepository::class),
            $type === ElementType::Sentence->value => app(SentenceRepository::class),
            $type === ElementType::Container->value => app(ContainerRepository::class),
        };
    }
}
