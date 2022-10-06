<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Actions;

use Modules\Container\Presenters\Internal\InitWrapperContainerPresenter as InitWrapperContainer;
use Modules\Core\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Core\Sources\Entities\Source;
use Modules\Core\Sources\Factories\SourceFactory;
use Modules\Core\Sources\Policies\SourcePolicy;
use Modules\Core\Sources\Repositories\SourceRepository;
use Modules\Core\Sources\Validators\CreateSourceValidator;
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

    public function __invoke(Client $client, array $attributes): Source
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->getLanguage->getOrThrowBadRequest((int) $attributes['language_id']);
        $this->policy->canCreate($client, $language);

        $source = $this->factory->new($client->user(), $language, $attributes);
        $this->repository->save($source);
        ($this->initWrapperContainer)($source);

        return $source;
    }
}
