<?php

declare(strict_types=1);

namespace Modules\Education\Source\Enums;

use Modules\Education\Source\Presenters\CreateLearningLanguageSourcePresenter;
use Modules\Education\Source\Presenters\CreateRealLanguageSourcePresenter;

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
