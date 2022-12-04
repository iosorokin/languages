<?php

declare(strict_types=1);

namespace Domain\Education\Language\Root;

use Core\Base\Model\Roles\Root;
use Domain\Exceptions\EntityNotFound;
use Domain\Education\Language\Root\Control\Cases\Dto\CreateLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\DeleteLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\GetLanguageDto;
use Domain\Education\Language\Root\Control\Cases\Dto\GetLanguagesDto;
use Domain\Education\Language\Root\Control\Cases\Dto\UpdateLanguageDto;
use Domain\Education\Language\Root\Control\Cases\CreateLanguageHandler;
use Domain\Education\Language\Root\Control\Cases\DeleteLanguageHandler;
use Domain\Education\Language\Root\Control\Cases\GetLanguageHandler;
use Domain\Education\Language\Root\Control\Cases\GetLanguagesHandler;
use Domain\Education\Language\Root\Control\Cases\UpdateLanguageHandler;
use Domain\Education\Language\Root\Domain\Model\LanguageCollection;
use Domain\Education\Language\Root\Domain\Model\Language;
use Domain\Education\Language\Root\Domain\Policy\CanAssignOwner;
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
    public function find(GetLanguageDto $dto): ?Language
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
    public function findOrFail(GetLanguageDto $dto): Language
    {
        /** @var GetLanguageHandler $handler */
        $handler = app()->make(GetLanguageHandler::class);

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
