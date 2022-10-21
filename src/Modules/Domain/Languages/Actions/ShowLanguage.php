<?php

declare(strict_types=1);

namespace Modules\Domain\Languages\Actions;

use Modules\Domain\Languages\Factories\LanguageFactory;
use Modules\Domain\Languages\Structures\Language;
use Modules\Personal\Auth\Contexts\Client;

final class ShowLanguage
{
    public function __construct(
        private LanguageFactory $factory,
    ) {}

    public function __invoke(Client $client, int $id): Language
    {
        $language = $this->factory
            ->repository()
            ->get($id);

        return $language;
    }
}
