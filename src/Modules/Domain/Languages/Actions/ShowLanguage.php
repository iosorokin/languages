<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Actions;

use Modules\Domain\Languages\Structures\Language;
use Modules\Domain\Languages\Repositories\LanguageRepository;
use Modules\Personal\Auth\Contexts\Client;

final class ShowLanguage
{
    public function __construct(
        private LanguageRepository $repository,
    ) {}

    public function __invoke(Client $client, int $id): Language
    {
        $language = $this->repository->get($id);

        return $language;
    }
}