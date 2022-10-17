<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Actions;

use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Factories\SourceFactory;
use Modules\Domain\Sources\Policies\SourcePolicy;
use Modules\Domain\Sources\Repositories\SourceRepository;
use Modules\Domain\Sources\Validators\CreateSourceValidator;
use Modules\Internal\Container\Events\SourceCreated;
use Modules\Personal\Auth\Contexts\Client;

final class CreateSource
{
    public function __construct(
        private CreateSourceValidator $validator,
        private GetLanguagePresenter  $getLanguage,
        private SourcePolicy          $policy,
        private SourceFactory         $factory,
        private SourceRepository      $repository,
    ) {}

    public function __invoke(Client $client, array $attributes): Source
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->getLanguage->getOrThrowBadRequest($attributes['language_id']);
        $this->policy->canCreate($client, $language);
        $source = $this->factory->new($client->user(), $language, $attributes);
        $this->repository->save($source);
        SourceCreated::dispatch($client->id(), $language->getId(), $source->getId());

        return $source;
    }
}
