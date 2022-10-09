<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Factories;

use Modules\Domain\Sentences\Repositories\SentenceRepository;
use Modules\Internal\Container\Enums\ElementType;
use Modules\Internal\Container\Repositories\ContainerRepository;

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
