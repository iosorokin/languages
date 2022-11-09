<?php

declare(strict_types=1);

namespace Domain\Core\Sources\Presenters\Mixins;

use Domain\Core\Languages\Model\Manager\Aggregates\Student\Policies\CanTakeToLearn;
use Domain\Core\Languages\Model\Manager\Queries\Mixins\GetLanguage;
use Domain\Core\Sources\Authorization\SourceAuthorizeUser;
use Domain\Core\Sources\Events\SourceCreated;
use Domain\Core\Sources\Factories\SourceFactory;
use Domain\Core\Sources\Structures\Source;
use Domain\Core\Sources\Validators\CreateSourceValidator;
use Domain\Sources\Repositories\SourceRepository;
use Illuminate\Events\Dispatcher;
use Infrastructure\Database\Repositories\Personal\Eloquent\EloquentUserModel;

final class CreateSource
{
    public function __construct(
        private SourceAuthorizeUser   $authorize,
        private CanTakeToLearn        $languagePolicy,
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
        $this->languagePolicy->__invoke($language);
        $source = $this->factory->create($user, $language, $attributes);
        $source->save();
        $event = new SourceCreated($source);
        $this->dispatcher->dispatch($event);

        return $source;
    }
}
