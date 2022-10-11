<?php

declare(strict_types=1);

namespace Modules\Personal\Permissions\Validators;

use Core\Validation\BaseValidator;
use Illuminate\Validation\Rules\Enum;
use Modules\Personal\Permissions\Enums\PermissionType;

final class PermissionsValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'permissions' => ['array'],
            'permissions.*' => ['required_if:permissions', new Enum(PermissionType::class)]
        ];
    }
}
