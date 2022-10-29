<?php

return [
    \Modules\Personal\Infrastructure\Repository\Eloquent\EloquentUserModel::class => 'user',
    \Modules\Domain\Languages\Infrastructure\Repository\Eloquent\Model\LanguageModel::class => 'language',
    \Modules\Domain\Sources\Structures\Source::class => 'source',
    \Modules\Internal\Container\Model\Container::class => 'container',
    \Modules\Internal\Container\Model\ContainerElement::class => 'container_element',
    \Modules\Domain\Sentences\Model\Sentence::class => 'sentence',
];
