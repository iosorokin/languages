<?php

declare(strict_types=1);

namespace Modules\Education\Dictionary\Actions;

use Modules\Container\Presenters\Internal\InitWrapperContainerPresenter as InitWrapperContainer;
use Modules\Education\Dictionary\Entities\Dictionary;
use Modules\Education\Dictionary\Factories\DictionaryFactory;
use Modules\Education\Dictionary\Policies\DictionaryPolicy;
use Modules\Education\Dictionary\Repositories\DictionaryRepository;
use Modules\Education\Dictionary\Validators\CreateDictionaryValidator;
use Modules\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Personal\Auth\Contexts\Client;

final class CreateDictionary
{
    public function __construct(
        private CreateDictionaryValidator $validator,
        private GetLanguagePresenter $getLanguage,
        private DictionaryPolicy $policy,
        private DictionaryFactory $factory,
        private DictionaryRepository $repository,
        private InitWrapperContainer $initWrapperContainer
    ) {}

    public function __invoke(Client $client, array $attributes): Dictionary
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->getLanguage->getOrThrowBadRequest($attributes['language_id']);
        $this->policy->canCreate($client, $language);
        $dictionary = $this->factory->create($client->user(), $language, $attributes);
        $this->repository->save($dictionary);
        ($this->initWrapperContainer)($dictionary);

        return $dictionary;
    }
}
