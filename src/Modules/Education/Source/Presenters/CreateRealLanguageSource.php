<?php

declare(strict_types=1);

namespace Modules\Education\Source\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Education\Source\CreateRealLanguageSourcePresenter;
use App\Contracts\Presenters\Languages\Real\GetRealLanguagePresenter;
use Illuminate\Support\Arr;
use Modules\Education\Source\Actions\CreateSource;
use Modules\Education\Source\Structures\SourceModel;

class CreateRealLanguageSource implements CreateRealLanguageSourcePresenter
{
    public function __construct(
        private CreateSource $createSource,
        private GetRealLanguagePresenter $getRealLanguage,
    ) {}

    /**
     * @param array<mixed> $attributes
     */
    public function __invoke(Client $client, array $attributes): SourceModel
    {
        $language = ($this->getRealLanguage)(Arr::get($attributes, 'id'));
        $source = ($this->createSource)($language, $attributes);

        return $source;
    }
}
