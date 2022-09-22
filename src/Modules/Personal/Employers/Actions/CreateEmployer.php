<?php

declare(strict_types=1);

namespace Modules\Personal\Employers\Actions;

use Illuminate\Support\Arr;
use Modules\Personal\Employers\Structures\EmployerModel;

final class CreateEmployer
{
    public function __invoke(array $attributes): EmployerModel
    {
        $employer = new EmployerModel();
        $employer->position = Arr::get($attributes, 'position');

        return $employer;
    }
}
