<?php

declare(strict_types=1);

namespace Modules\Container\Factories;

use Modules\Container\Enums\ElementType;
use Modules\Container\Repositories\ContainerRepository;
use Modules\Domain\Sentences\Repositories\SentenceRepository;

final class ElementRepositoryFactory
{
    public function createFromType(string $type): SentenceRepository|ContainerRepository
    {
        return match (true) {
            $type === ElementType::Sentence->value => app(SentenceRepository::class),
            $type === ElementType::Container->value => app(ContainerRepository::class),
        };
    }
}
