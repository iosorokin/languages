<?php

declare(strict_types=1);

namespace Domain\Core\Language\Root\Control\Queries;

use App\Model\Roles\Root;
use Domain\Core\Language\Base\Control\Query\FindLanguageImp;
use Domain\Core\Language\Base\Repository\Query\Find\FindLanguage as FindLanguageQuery;

final class RootFindLanguageImp implements RootFindLanguage
{
    public function __construct(
        private Root            $root,
        private FindLanguageImp $findLanguage,
    ) {}

    public function root(): Root
    {
        return $this->root;
    }

    public function find(): FindLanguageQuery
    {
        return $this->findLanguage->find();
    }
}
