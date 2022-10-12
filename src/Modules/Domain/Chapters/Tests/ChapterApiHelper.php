<?php

declare(strict_types=1);

namespace Modules\Domain\Chapters\Tests;

use Core\Base\Helpers\ApiHelper;
use Illuminate\Testing\TestResponse;
use Modules\Domain\Sources\Structures\Source;
use Modules\Internal\Container\Tests\ContainerAppHelper;

final class ChapterApiHelper extends ApiHelper
{
    public function store(int $sourceId, array $overwrite = []): TestResponse
    {
        $attributes = ContainerAppHelper::new()->generateAttributes();
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
