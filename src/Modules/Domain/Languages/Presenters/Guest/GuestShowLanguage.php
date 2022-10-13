<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Presenters\Guest;

use Modules\Domain\Languages\Actions\ShowLanguage;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Contexts\Client;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class GuestShowLanguage implements GuestShowLanguagePresenter
{
    public function __construct(
        private GetClientPresenter $getClient,
        private ShowLanguage $showLanguage,
    ) {}

    public function __invoke(int $id): Language
    {
        $client = ($this->getClient)();
        $language = ($this->showLanguage)($client, $id);

        return $language;
    }
}
