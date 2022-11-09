<?php

declare(strict_types=1);

namespace App\Controll\Commands\Language;

use Domain\Core\Languages\Model\Manager\Commands\Manager\UpdateLanguage;

final class UpdateLanguageCommand extends BaseLanguageCommand implements UpdateLanguage
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
