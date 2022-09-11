<?php

declare(strict_types=1);

namespace Modules\Education\Source\Enums;

use App\Contracts\Presenters\Education\Source\CreateRealLanguageSourcePresenter;

enum LanguageTypes: string
{
    case Real = 'real';

    public function getPresenterClassName(): string
    {
        return match (true) {
            $this->name === self::Real->name => CreateRealLanguageSourcePresenter::class
        };
    }
}
