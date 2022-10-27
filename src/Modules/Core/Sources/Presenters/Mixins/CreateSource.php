<?php

declare(strict_types=1);

namespace Modules\Core\Sources\Presenters\Mixins;

use Illuminate\Events\Dispatcher;
use Modules\Core\Languages\Application\Presenters\Internal\GetLanguage;
use Modules\Core\Languages\Domain\Policies\LanguagePolicy;
use Modules\Core\Sources\Authorization\SourceAuthorizeUser;
use Modules\Core\Sources\Events\SourceCreated;
use Modules\Core\Sources\Factories\SourceFactory;
use Modules\Core\Sources\Repositories\SourceRepository;
use Modules\Core\Sources\Structures\Source;
use Modules\Core\Sources\Validators\CreateSourceValidator;
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
