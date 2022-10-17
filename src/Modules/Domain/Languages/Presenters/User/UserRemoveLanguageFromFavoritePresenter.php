<?php

namespace Modules\Domain\Languages\Presenters\User;

interface UserRemoveLanguageFromFavoritePresenter
{
    public function __invoke(array $attributes): void;
}
