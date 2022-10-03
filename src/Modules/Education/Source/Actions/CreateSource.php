<?php

declare(strict_types=1);

namespace Modules\Education\Source\Actions;

use App\Contracts\Contexts\Client;
use Modules\Education\Source\Entity\SourceModel;
use Modules\Education\Source\Factory\SourceFactory;
use Modules\Education\Source\Policy\SourcePolicy;
use Modules\Education\Source\Repositories\SourceRepository;
use Modules\Education\Source\Validator\CreateSourceValidator;
use Modules\Languages\Presenters\Internal\GetLanguagePresenter;

final class CreateSource
{
    public function __construct(
        private CreateSourceValidator $validator,
        private GetLanguagePresenter $getLanguage,
        private SourcePolicy $policy,
        private SourceFactory $factory,
        private SourceRepository   $repository,
    ) {}

    public function __invoke(Client $client, array $attributes): SourceModel
    {
        $attributes = $this->validator->validate($attributes);
        $language = $this->getLanguage->getOrThrowBadRequest($attributes['language_id']);
        $this->policy->canCreate($client, $language);

        $source = $this->factory->new($client->user(), $language, $attributes);
        $this->repository->save($source);

        return $source;
    }
}
