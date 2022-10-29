<?php

declare(strict_types=1);

namespace Modules\Domain\Sources\Helpers;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;
use Modules\Domain\Sources\Structures\Source;

final class SourceApiHelper extends ApiHelper
{
    public function userStore(array $overwrite = []): TestResponse
    {
        $attributes = $overwrite + SourceSeedHelper::new()->generateAttributes();

        return $this->testCase->postJson(route('api.user.sources.store', [
            'language_id' => $attributes['language_id']
        ]), $attributes);
    }

    public function guestShow(Source|int $source, array $attributes = []): TestResponse
    {
        $attributes['source_id'] = is_int($source) ? $source : $source->getId();

        return $this->testCase->getJson(route('api.sources.show', $attributes));
    }

    public function userShow(Source|int $source, array $attributes = []): TestResponse
    {
        $attributes['source_id'] = is_int($source) ? $source : $source->getId();

        return $this->testCase->getJson(route('api.user.sources.show', $attributes));
    }

    public function guestIndex(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.sources.index', $attributes));
    }

    public function userIndex(array $attributes = []): TestResponse
    {
        return $this->testCase->getJson(route('api.user.sources.index', $attributes));
    }

    public function userUpdate(Source|int $source, array $attributes = []): TestResponse
    {
        $attributes['source_id'] = is_int($source) ? $source : $source->getId();

        return $this->testCase->postJson(route('api.user.sources.destroy', [
            'language_id' => $attributes['language_id']
        ]), $attributes);
    }

    public function userDelete(Source|int $source): TestResponse
    {
        return $this->testCase->postJson(route('api.user.sources.store', [
            'source' => is_int($source) ? $source : $source->getId(),
        ]));
    }
}
