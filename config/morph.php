<?php

return [
    \Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel::class => 'user',
    \App\Repositories\Eloquent\Language\Eloquent\Model\LanguageModel::class => 'language',
    \Domain\Core\Sources\Structures\Source::class => 'source',
    \Domain\Internal\Container\Model\Container::class => 'container',
    \Domain\Internal\Container\Model\ContainerElement::class => 'container_element',
    \Domain\Core\Sentences\Model\Sentence::class => 'sentence',
];
