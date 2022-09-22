<?php

declare(strict_types=1);

namespace Modules\Education\Source\Tests;

use Core\Test\Helper;
use Illuminate\Support\Arr;
use Modules\Education\Source\Presenters\CreateRealLanguageSourcePresenter;
use Modules\Personal\Auth\Contexts\ClientContext;

final class SourceHelper extends Helper
{
    public function generateAttributes(): array
    {
        return [
            'type' => Arr::random(['movie']),
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }

    public function createRealLanguageSource(int $id, array $attributes = []): void
    {
        $attributes = $this->generateAttributes() + $attributes;
        $attributes['id'] = $id;

        /** @var CreateRealLanguageSourcePresenter $createSource */
        $createSource = app()->make(CreateRealLanguageSourcePresenter::class);
        $createSource(new ClientContext(), $attributes);
    }
}
