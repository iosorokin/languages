<?php

declare(strict_types=1);

namespace App\Controll\Commands\Language;


use Domain\Core\Language\Root\Control\Commands\RootUpdateLanguage;

final class UpdateLanguageCommand extends BaseLanguageCommand implements RootUpdateLanguage
{
    protected int $id;

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);

        $this->id = $attributes['id'];
    }

    public function id(): int
    {
        return $this->id;
    }
}
