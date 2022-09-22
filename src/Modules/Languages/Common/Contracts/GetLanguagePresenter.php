<?php

namespace Modules\Languages\Common\Contracts;

interface GetLanguagePresenter
{
    public function __invoke(int $id, string $type): LanguageStructure;
}
