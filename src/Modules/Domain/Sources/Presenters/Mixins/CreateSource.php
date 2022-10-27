<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Presenters\Mixins;

use Illuminate\Events\Dispatcher;
use Modules\Domain\Languages\Policies\LanguagePolicy;
use Modules\Domain\Languages\Presenters\Internal\GetLanguage;
use Modules\Domain\Sources\Authorization\SourceAuthorizeUser;
use Modules\Domain\Sources\Events\SourceCreated;
use Modules\Domain\Sources\Factories\SourceFactory;
use Modules\Domain\Sources\Repositories\SourceRepository;
use Modules\Domain\Sources\Structures\Source;
use Modules\Domain\Sources\Validators\CreateSourceValidator;
use Modules\Personal\Infrastructure\Repository\EloquentUserModel;

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
