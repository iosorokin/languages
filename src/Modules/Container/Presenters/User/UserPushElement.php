<?php

declare(strict_types=1);

namespace Modules\Container\Presenters\User;

use Modules\Container\Entites\ContainerElement;
use Modules\Container\Factories\ElementRepositoryFactory;
use Modules\Container\Services\Dispatcher\ContainerDispatcher;
use Modules\Container\Validators\ElementValidator;

final class UserPushElement implements UserPushElementPresenter
{
    public function __construct(
        private ElementValidator $validator,
        private ElementRepositoryFactory $repositoryFactory,
        private ContainerDispatcher $containerDispatcher,
    ) {}

    public function __invoke(array $attributes): ContainerElement
    {
        $attributes = $this->validator->validate($attributes);
        $elementRepository = $this->repositoryFactory->createFromType($attributes['element_type']);
        $containerableElement = $elementRepository->get($attributes['element_id']);
        abort_if(! $containerableElement, 404);
        $manipulator = $this->containerDispatcher->load((int)$attributes['id']);
        $element = $manipulator->push($containerableElement);

        return $element;
    }
}
