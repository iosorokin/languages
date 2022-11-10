<?php

declare(strict_types=1);

namespace Infrastructure\Support\Validation\Validators\Single;

use Domain\Account\Model\Entities\Accesses\Access;
use Illuminate\Validation\Rules\Enum;
use Infrastructure\Support\Validation\BaseValidator;

final class RolesValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'roles' => [new Enum(Access::class)],
        ];
    }
}
