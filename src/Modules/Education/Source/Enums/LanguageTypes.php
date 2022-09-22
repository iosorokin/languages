<?php

declare(strict_types=1);

namespace Modules\Education\Source\Enums;

use App\Contracts\Presenters\Education\Source\CreateLearningLanguageSourcePresenter;
use App\Contracts\Presenters\Education\Source\CreateRealLanguageSourcePresenter;

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
