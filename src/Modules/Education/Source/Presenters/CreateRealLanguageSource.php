<?php

declare(strict_types=1);

namespace Modules\Education\Source\Presenters;

use App\Contracts\Presenters\Education\Source\CreateRealLanguageSourcePresenter;
use App\Contracts\Presenters\Languages\Real\GetRealLanguagePresenter;
use Illuminate\Support\Arr;
use Modules\Education\Source\Actions\CreateSource;
use Modules\Personal\Auth\Contexts\ClientContext;

class CreateRealLanguageSource implements CreateRealLanguageSourcePresenter
{
    public function __construct(
        private CreateSource $createSource,
        private GetRealLanguagePresenter $getRealLanguage,
    ) {}

    /**
     * @param array<mixed> $attributes
     */
    public function __invoke(ClientContext $client, array $attributes)
    {
        $language = ($this->getRealLanguage)(Arr::get($attributes, 'id'));
        $source = ($this->createSource)($language, $attributes);
    }
}
