<?php

declare(strict_types=1);

namespace Modules\Education\Source\Presenters;

use App\Contracts\Contexts\Client;
use Illuminate\Support\Arr;
use Modules\Education\Source\Actions\CreateSource;
use Modules\Education\Source\Structures\SourceModel;
use Modules\Languages\Learning\Presenters\GetLearningLanguagePresenter;

final class CreateLearningLanguageSource implements CreateLearningLanguageSourcePresenter
{
    public function __construct(
        private CreateSource                 $createSource,
        private GetLearningLanguagePresenter $getLearningLanguage,
    ) {}

    /**
     * @param array<mixed> $attributes
     */
    public function __invoke(Client $client, array $attributes): SourceModel
    {
        $language = ($this->getLearningLanguage)($client, Arr::get($attributes, 'id'));
        $source = ($this->createSource)($language, $attributes);

        return $source;
    }
}
