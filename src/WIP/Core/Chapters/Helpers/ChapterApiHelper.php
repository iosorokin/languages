<?php

declare(strict_types=1);

namespace WIP\Core\Chapters\Helpers;

use App\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;
use WIP\Internal\Container\Helpers\ContainerSeedHelper;

final class ChapterApiHelper extends ApiHelper
{
    public function store(int $sourceId, array $overwrite = []): TestResponse
    {
        $attributes = ContainerSeedHelper::new()->generateAttributes();
        $attributes += $overwrite;
        $response = $this->testCase->postJson(route('api.user.chapters.store', [
            'source_id' => $sourceId,
        ]), $attributes);

        return $response;
    }

    public function show(int $chapterId, array $query = []): TestResponse
    {
        $query['chapter_id'] = $chapterId;
        $response = $this->testCase->getJson(route('api.chapters.show', $query));

        return $response;
    }
}
