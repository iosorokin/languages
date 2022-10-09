<?php

declare(strict_types=1);

namespace Modules\Internal\Container\Validators;

use App\Rules\BigIntId;
use Core\Extensions\BaseValidator;
use Illuminate\Validation\Rules\Enum;
use Modules\Internal\Container\Enums\ElementType;

final class ElementValidator extends BaseValidator
{
    protected function rules(): array
    {
        return [
            'id' => ['required', new BigIntId()],
            'element_type' => ['required', new Enum(ElementType::class)],
            'element_id' => ['required', new BigIntId()],
        ];
    }
}
