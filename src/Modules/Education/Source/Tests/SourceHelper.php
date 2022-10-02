<?php

declare(strict_types=1);

namespace Modules\Education\Source\Tests;

use Core\Base\Helpers\AppHelper;
use Illuminate\Support\Arr;
use Modules\Personal\Auth\Contexts\ClientContext;

final class SourceHelper extends AppHelper
{
    public function generateAttributes(): array
    {
        return [
            'type' => Arr::random(['movie', 'song']),
            'title' => $this->faker()->title(),
            'description' => $this->faker()->text(),
        ];
    }

    public function createSource(int $id, array $attributes = []): void
    {
        $attributes = $this->generateAttributes() + $attributes;
        $attributes['id'] = $id;

        /** @var CreateRealLanguageSourcePresenter $createSource */
        $createSource = app()->make(CreateRealLanguageSourcePresenter::class);
        $createSource(new ClientContext(), $attributes);
    }
}
