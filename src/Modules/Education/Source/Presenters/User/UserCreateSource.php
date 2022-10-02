<?php

declare(strict_types=1);

namespace Modules\Education\Source\Presenters\User;

use Modules\Education\Source\Entity\Source;
use Modules\Education\Source\Policy\SourcePolicy;
use Modules\Education\Source\Validator\CreateSourceValidator;
use Modules\Languages\Presenters\Internal\GetLanguagePresenter;
use Modules\Personal\Auth\Presenters\GetClientPresenter;

final class UserCreateSource implements UserCreateSourcePresenter
{
    public function __construct(
        private CreateSourceValidator $validator,
        private GetClientPresenter $getClient,
        private GetLanguagePresenter $getLanguage,
        private SourcePolicy $policy,
        private UserCreateSourcePresenter $createSource,
    ) {}

    /**
     * @param array<mixed> $attributes
     */
    public function __invoke(array $attributes): Source
    {
        $attributes = $this->validator->validate($attributes);
        $client = ($this->getClient)();
        $language = ($this->getLanguage)($attributes['language_id']);
        $this->policy->canCreate($client, $language);
        $source = ($this->createSource)($client->user(), $attributes);

        return $source;
    }
}
