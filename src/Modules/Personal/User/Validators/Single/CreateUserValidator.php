<?php

declare(strict_types=1);

namespace Modules\Personal\User\Validators\Single;


final class CreateUserValidator extends UserValidator
{
    /**
     * @return array<mixed>
     */
    protected function rules(): array
    {
        return $this->defaultRules();
    }
}