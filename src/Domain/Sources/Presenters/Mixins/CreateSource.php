<?php

declare(strict_types=1);

namespace Domain\Sources\Presenters\Mixins;

use Illuminate\Events\Dispatcher;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;
use Domain\Languages\Application\Presenters\Internal\GetLanguage;
use Domain\Languages\Domain\Policies\LanguagePolicy;
use Domain\Sources\Authorization\SourceAuthorizeUser;
use Domain\Sources\Events\SourceCreated;
use Domain\Sources\Factories\SourceFactory;
use Domain\Sources\Repositories\SourceRepository;
use Domain\Sources\Structures\Source;
use Domain\Sources\Validators\CreateSourceValidator;

final class CreateSource
{
    public function __construct(
        private SourceAuthorizeUser   $authorize,
        private LanguagePolicy        $languagePolicy,
        private CreateSourceValidator $validator,
        private GetLanguage           $getLanguage,
        private SourceFactory         $factory,
        private Dispatcher            $dispatcher
    ) {}

    public function __invoke(EloquentUserModel $user, array $attributes): Source
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->getLanguage->getOrThrowBadRequest($attributes['language_id']);
        $this->authorize->canCreate($user, $language);
        $this->languagePolicy->canTakeToLearn($language);
        $source = $this->factory->create($user, $language, $attributes);
        $source->save();
        $event = new SourceCreated($source);
        $this->dispatcher->dispatch($event);

        return $source;
    }
}
