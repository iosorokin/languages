<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Mixins;

use Modules\Domain\Languages\Policies\LanguagePolicy;
use Modules\Domain\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Domain\Sources\Authorization\SourceAuthorizeUser;
use Modules\Domain\Sources\Events\SourceCreated;
use Modules\Domain\Sources\Factories\SourceFactory;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Validators\CreateSourceValidator;
use Modules\Personal\Auth\Contexts\Client;

final class CreateSource
{
    public function __construct(
        private SourceAuthorizeUser   $authorize,
        private LanguagePolicy        $languagePolicy,
        private CreateSourceValidator $validator,
        private GetLanguagePresenter  $getLanguage,
        private SourceFactory         $factory,
    ) {}

    public function __invoke(Client $client, array $attributes): Source
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->getLanguage->getOrThrowBadRequest($attributes['language_id']);
        $this->authorize->canCreate($client, $language);
        $this->languagePolicy->canTakeToLearn($language);
        $source = $this->factory->structure()
            ->new($client->user(), $language, $attributes);
        $this->factory->repository()
            ->save($source);
        SourceCreated::dispatch($client->id(), $language->getId(), $source->getId());

        return $source;
    }
}
