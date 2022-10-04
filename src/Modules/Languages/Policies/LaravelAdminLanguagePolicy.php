<?php

declare(strict_types=1);

namespace Modules\Languages\Policies;

use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class LaravelAdminLanguagePolicy implements AdminLanguagePolicy
{
    public function __construct(
        private GetClientPresenter $getClient,
    ) {}

    public function canCreate(): Client
    {
        return ($this->getClient)();
    }
}
