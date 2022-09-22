<?php

declare(strict_types=1);

namespace Modules\Education\Dictionaries\Presenters;

use App\Contracts\Contexts\Client;
use App\Contracts\Structures\DictionaryStructure;
use App\Contracts\Structures\LanguageStructure;
use Illuminate\Support\Arr;
use Modules\Education\Dictionaries\Repositories\DictionaryRepository;
use Modules\Education\Dictionaries\Structures\DictionaryModel;

final class CreateDictionary
{
    public function __construct(
        private DictionaryRepository $repository,
    ) {}

    public function __invoke(Client $client, LanguageStructure $language, array $attributes): DictionaryStructure
    {
        $model = $this->createModel($language, $attributes);
        $this->repository->save($model);

        return $model;
    }

    private function createModel(LanguageStructure $language, array $attributes): DictionaryModel
    {
        $model = new DictionaryModel();
        $model->setLanguage($language);
        $model->title = Arr::get($attributes, 'title');
        $model->description = Arr::get($attributes, 'description');

        return $model;
    }
}
