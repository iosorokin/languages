<?php

declare(strict_types=1);

namespace Modules\Container\Enums;

use Modules\Container\Presenters\CreateLearningLanguageSourcePresenter;
use Modules\Container\Presenters\CreateRealLanguageSourcePresenter;

enum LanguageTypes: string
{
    case Real = 'real';

    case Learning = 'learning';

    public function getPresenterClassName(): string
    {
        return match (true) {
            $this->name === self::Real->name => CreateRealLanguageSourcePresenter::class,
            $this->name === self::Learning->name => CreateLearningLanguageSourcePresenter::class,
        };
    }
}
