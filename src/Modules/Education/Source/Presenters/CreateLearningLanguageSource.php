<?php

declare(strict_types=1);

namespace Modules\Education\Source\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\Presenters\Education\Source\CreateLearningLanguageSourcePresenter;
use App\Contracts\Presenters\Languages\Learning\GetLearningLanguagePresenter;
use Illuminate\Support\Arr;
use Modules\Education\Source\Actions\CreateSource;
use Modules\Education\Source\Structures\SourceModel;

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
