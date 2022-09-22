<?php

declare(strict_types=1);

namespace App\Tests\Helpers\Education;

use App\Contracts\Presenters\Education\Source\CreateRealLanguageSourcePresenter;
use Core\Test\Helper;
use Illuminate\Support\Arr;
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
