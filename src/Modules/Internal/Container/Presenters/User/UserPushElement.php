<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Presenters\User;

use Modules\Internal\Container\Entites\ContainerElement;
use Modules\Internal\Container\Factories\ElementRepositoryFactory;
use Modules\Internal\Container\Presenters\Internal\PushElementPresenter;
use Modules\Internal\Container\Validators\ElementValidator;

final class UserPushElement implements UserPushElementPresenter
{
    public function __construct(
        private ElementValidator $validator,
        private ElementRepositoryFactory $repositoryFactory,
        private PushElementPresenter $pushElement,
    ) {}

    public function __invoke(array $attributes): ContainerElement
    {
        $attributes = $this->validator->validate($attributes);
        $elementRepository = $this->repositoryFactory->createFromType($attributes['element_type']);
        $containerableElement = $elementRepository->get($attributes['element_id']);
        abort_if(! $containerableElement, 404);
        $element = ($this->pushElement)((int)$attributes['id'], $containerableElement);

        return $element;
    }
}
