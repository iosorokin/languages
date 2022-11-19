<?php

declare(strict_types=1);

namespace WIP\Core\Sources\Presenters\Mixins;

use Domain\Core\Languages\Model\Manager\Aggregates\Student\Policies\StudentCanTakeToLearn;
use Domain\Core\Languages\Model\Manager\Queries\Mixins\GetLanguage;
use Domain\Sources\Repositories\SourceRepository;
use Illuminate\Events\Dispatcher;
use Infrastructure\Database\Repositories\Eloquent\Personal\Eloquent\EloquentUserModel;
use WIP\Core\Sources\Authorization\SourceAuthorizeUser;
use WIP\Core\Sources\Events\SourceCreated;
use WIP\Core\Sources\Factories\SourceFactory;
use WIP\Core\Sources\Structures\Source;
use WIP\Core\Sources\Validators\CreateSourceValidator;

final class CreateSource
{
    public function __construct(
        private SourceAuthorizeUser   $authorize,
        private StudentCanTakeToLearn $languagePolicy,
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
