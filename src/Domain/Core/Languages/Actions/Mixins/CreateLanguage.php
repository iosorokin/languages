<?php

declare(strict_types=1);

namespace Domain\Core\Languages\Actions\Mixins;

use App\Repositories\Eloquent\Language\LanguageRepository;
use Domain\Core\Languages\Authorization\LanguageAuthorization;
use Domain\Core\Languages\Dto\CreateLanguageDto;
use Domain\Core\Languages\Model\Agregates\Language\Language;
use Domain\Core\Languages\Model\Agregates\Language\LanguageFactory;
use Domain\Support\Authorization\Manager;

final class CreateLanguage
{
    public function __construct(
        private LanguageFactory $factory,
        private LanguageAuthorization $authorization,
        private LanguageRepository $repository,
    ) {}

    public function __invoke(Manager $manager, CreateLanguageDto $dto): Language
    {
        $dto->setOwner($manager->id()->toInt());
        $language = $this->factory->new($dto);
        $language->commit($this->repository, $this->authorization);

        return $language;
    }
}
