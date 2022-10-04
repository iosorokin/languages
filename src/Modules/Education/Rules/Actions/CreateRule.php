<?php

declare(strict_types=1);

namespace Modules\Education\Rules\Actions;

use Modules\Education\Rules\Entities\Rule;
use Modules\Education\Rules\Factories\RuleFactory;
use Modules\Education\Rules\Policies\RulePolicy;
use Modules\Education\Rules\Repositories\RuleRepository;
use Modules\Education\Rules\Validators\CreateRulesValidator;
use Modules\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Personal\Auth\Contexts\Client;

final class CreateRule
{
    public function __construct(
        private CreateRulesValidator $validator,
        private GetLanguagePresenter $getLanguage,
        private RulePolicy $policy,
        private RuleFactory $factory,
        private RuleRepository $repository,
    ) {}

    public function __invoke(Client $client, array $attributes): Rule
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->getLanguage->getOrThrowBadRequest($attributes['language_id']);
        $this->policy->canCreate($client, $language);
        $rule = $this->factory->create($client->user(), $language, $attributes);
        $this->repository->save($rule);

        return $rule;
    }
}
