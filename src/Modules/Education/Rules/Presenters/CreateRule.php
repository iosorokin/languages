<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Presenters;

use Illuminate\Support\Arr;
use Modules\Education\Rules\Repositories\RuleRepository;
use Modules\Education\Rules\Structures\RuleModel;
use Modules\Education\Rules\Structures\RuleStructure;
use Modules\Education\Rules\Validators\CreateRulesValidator;
use Modules\Languages\Common\Contracts\LanguageStructure;
use Modules\Languages\Common\Presenters\GetLanguagePresenter;

final class CreateRule implements CreateRulePresenter
{
    public function __construct(
        private GetLanguagePresenter $getLanguage,
        private RuleRepository $repository,
        private CreateRulesValidator $validator,
    ) {}

    public function __invoke(array $attributes)
    {
        $attributes = $this->validator->validate($attributes);
        $language = ($this->getLanguage)(
            Arr::get($attributes, 'language_id'),
            Arr::get($attributes, 'language_type')
        );
        $rule = $this->createStructure($language, $attributes);
        $this->repository->save($rule);

        return $rule;
    }

    private function createStructure(LanguageStructure $language, array $attributes): RuleStructure
    {
        $structure = new RuleModel();
        $structure->setLanguage($language);
        $structure->title = Arr::get($attributes, 'title');
        $structure->description = Arr::get($attributes, 'description');

        return $structure;
    }
}
