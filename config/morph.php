<?php

return [
    \Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel::class => 'user',
    \Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel::class => 'language',
    \Domain\Sources\Structures\Source::class => 'source',
    \Domain\Internal\Container\Model\Container::class => 'container',
    \Domain\Internal\Container\Model\ContainerElement::class => 'container_element',
    \Domain\Sentences\Model\Sentence::class => 'sentence',
];
