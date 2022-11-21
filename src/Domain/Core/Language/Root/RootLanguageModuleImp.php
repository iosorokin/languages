<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root;

use App\Base\Model\Roles\Root;
use App\Exceptions\EntityNotFound;
use Domain\Core\Language\Root\Control\CreateLanguageHandler;
use Domain\Core\Language\Root\Control\DeleteLanguageHandler;
use Domain\Core\Language\Root\Control\Dto\CreateLanguageDto;
use Domain\Core\Language\Root\Control\Dto\DeleteLanguageDto;
use Domain\Core\Language\Root\Control\Dto\FindLanguageDto;
use Domain\Core\Language\Root\Control\Dto\GetLanguagesDto;
use Domain\Core\Language\Root\Control\Dto\UpdateLanguageDto;
use Domain\Core\Language\Root\Control\FindLanguageHandler;
use Domain\Core\Language\Root\Control\GetLanguagesHandler;
use Domain\Core\Language\Root\Control\UpdateLanguageHandler;
use Domain\Core\Language\Root\Model\Language;
use Domain\Core\Language\Root\Model\LanguageCollection;
use Domain\Core\Language\Root\Policy\CanAssignOwner;
use Illuminate\Contracts\Container\BindingResolutionException;

final class RootLanguageModuleImp implements RootLanguageModule
{
    public function __construct(
        private Root $root,
    ) {}

    /**
     * @throws BindingResolutionException
     */
    public function create(CreateLanguageDto $dto): Language
    {
        (new CanAssignOwner())($this->root, $dto);
        /** @var CreateLanguageHandler $handler */
        $handler = app()->make(CreateLanguageHandler::class);

        return $handler($dto);
    }

    /**
     * @throws BindingResolutionException
     */
    public function update(UpdateLanguageDto $dto): void
    {
        /** @var UpdateLanguageHandler $handler */
        $handler = app()->make(UpdateLanguageHandler::class);
        $handler($dto);
    }

    /**
     * @throws BindingResolutionException
     */
    public function delete(DeleteLanguageDto $dto): void
    {
        /** @var DeleteLanguageHandler $action */
        $action = app()->make(DeleteLanguageHandler::class);
        $action($dto);
    }

    /**
     * @throws BindingResolutionException
     */
    public function find(FindLanguageDto $dto): ?Language
    {
        try {
            return $this->findOrFail($dto);
        } catch (EntityNotFound) {
            return null;
        }
    }

    /**
     * @throws EntityNotFound
     * @throws BindingResolutionException
     */
    public function findOrFail(FindLanguageDto $dto): Language
    {
        /** @var FindLanguageHandler $handler */
        $handler = app()->make(FindLanguageHandler::class);

        return $handler($dto);
    }

    /**
     * @throws BindingResolutionException
     */
    public function get(GetLanguagesDto $dto): LanguageCollection
    {
        /** @var GetLanguagesHandler $action */
        $action = app()->make(GetLanguagesHandler::class);

        return $action($dto);
    }
}
