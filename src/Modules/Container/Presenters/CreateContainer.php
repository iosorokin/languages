<?php

declare(strict_types=1);

namespace Modules\Container\Presenters;

use Illuminate\Support\Arr;
use Modules\Container\Contracts\Containerable;
use Modules\Container\Structures\ContainerModel;
use Modules\Container\Structures\ContainerStructure;
use Modules\Container\Validators\CreateContainerValidator;

final class CreateContainer
{
    public function __construct(
        private CreateContainerValidator $validator,
    ) {}

    public function __invoke(array $attributes)
    {
        $attributes = $this->validator->validate($attributes);

    }

    private function createModel(Containerable $containerable, array $attributes): ContainerStructure
    {
        $model = new ContainerModel();
        $model->setContainerable($containerable);
        $model->title = Arr::get($attributes, 'title');
        $model->description = Arr::get($attributes, 'description');

        return $model;
    }
}
