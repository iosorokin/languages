<?php

declare(strict_types=1);

namespace Modules\Personal\Validators\Single;

use Core\Base\Validation\BaseValidator;
use Illuminate\Validation\Rules\Enum;
use Modules\Personal\Enums\Role;

final class RolesValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'roles' => [new Enum(Role::class)],
        ];
    }
}
