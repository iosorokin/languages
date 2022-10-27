<?php

return [
    \Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel::class => 'user',
    \Modules\Core\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel::class => 'language',
    \Modules\Core\Sources\Structures\Source::class => 'source',
    \Modules\Internal\Container\Model\Container::class => 'container',
    \Modules\Internal\Container\Model\ContainerElement::class => 'container_element',
    \Modules\Core\Sentences\Model\Sentence::class => 'sentence',
];
