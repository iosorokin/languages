<?php

declare(strict_types=1);

namespace Modules\Container\Contexts\Fillers;

use Modules\Education\Source\Entities\Source;
use Modules\Languages\Common\Contracts\LanguageStructure;

final class SourceFiller
{
    public function __construct(
        private Source $structure
    ) {}

    public function setStructure(Source $structure): self
    {
        $this->structure = $structure;

        return $this;
    }

    public function getStructure(): Source
    {
        return $this->structure;
    }

    public function setType(string $type): self
    {
        $this->structure->type = $type;

        return $this;
    }

    public function setLanguage(LanguageStructure $language): self
    {
        $this->structure->setLanguage($language);

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->structure->title = $title;

        return $this;
    }

    public function setDescription(string $description): self
    {
        $this->structure->description = $description;

        return $this;
    }
}
