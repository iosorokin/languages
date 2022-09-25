<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Presenters;

use Illuminate\Support\Arr;
use Modules\Education\Dictionary\Repositories\DictionaryRepository;
use Modules\Education\Dictionary\Structures\DictionaryModel;
use Modules\Education\Dictionary\Structures\DictionaryStructure;
use Modules\Languages\Common\Contracts\LanguageStructure;
use Modules\Languages\Common\Presenters\GetLanguagePresenter;

final class CreateDictionary
{
    public function __construct(
        private GetLanguagePresenter $getLanguage,
        private DictionaryRepository $repository,
    ) {}

    public function __invoke(array $attributes): DictionaryStructure
    {
        $language = ($this->getLanguage)(Arr::get($attributes, 'id'), Arr::get($attributes, 'type'));
        $model = $this->createModel($attributes);
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
