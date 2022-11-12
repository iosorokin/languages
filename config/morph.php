<?php

return [
    \Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel::class => 'user',
    \Infrastructure\Database\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel::class => 'language',
    \WIP\Core\Sources\Structures\Source::class => 'source',
    \WIP\Internal\Container\Model\Container::class => 'container',
    \WIP\Internal\Container\Model\ContainerElement::class => 'container_element',
    \WIP\Core\Sentences\Model\Sentence::class => 'sentence',
];
