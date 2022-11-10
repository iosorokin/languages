<?php

declare(strict_types=1);

namespace App\Support\Validation\Validators\Single;

use App\Base\Validation\BaseValidator;
use Domain\Account\Model\Entities\Accesses\Access;
use Illuminate\Validation\Rules\Enum;

final class RolesValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'roles' => [new Enum(Access::class)],
        ];
    }
}
