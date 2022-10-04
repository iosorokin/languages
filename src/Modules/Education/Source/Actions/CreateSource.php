<?php

declare(strict_types=1);

namespace Modules\Education\Source\Actions;

use Modules\Container\Presenters\Internal\InitWrapperContainerPresenter as InitWrapperContainer;
use Modules\Education\Source\Entities\SourceModel;
use Modules\Education\Source\Factories\SourceFactory;
use Modules\Education\Source\Policies\SourcePolicy;
use Modules\Education\Source\Repositories\SourceRepository;
use Modules\Education\Source\Validators\CreateSourceValidator;
use Modules\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Personal\Auth\Contexts\Client;

final class CreateSource
{
    public function __construct(
        private CreateSourceValidator $validator,
        private GetLanguagePresenter  $getLanguage,
        private SourcePolicy          $policy,
        private SourceFactory         $factory,
        private SourceRepository      $repository,
        private InitWrapperContainer  $initWrapperContainer
    ) {}

    public function __invoke(Client $client, array $attributes): SourceModel
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->getLanguage->getOrThrowBadRequest($attributes['language_id']);
        $this->policy->canCreate($client, $language);

        $source = $this->factory->new($client->user(), $language, $attributes);
        $this->repository->save($source);
        ($this->initWrapperContainer)($source);

        return $source;
    }
}
