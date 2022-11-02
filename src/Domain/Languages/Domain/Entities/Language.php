<?php

declare(strict_types=1);

namespace Domain\Languages\Domain\Entities;

use App\Values\Datetime\PresetTimestamps;
use App\Values\Identificatiors\Id\BigIntIntId;
use App\Values\Text\Info;

final class Language
{
    private BigIntIntId $id;

    private Info $info;

    private PresetTimestamps $timestamps;

    public function setId(BigIntIntId $id): void
    {
        $this->id = $id;
    }

    public function id(): BigIntIntId
    {
        return $this->id;
    }

    public function setInfo(Info $info): void
    {
        $this->info = $info;
    }

    public function info(): Info
    {
        return $this->info;
    }

    public function setTimestamps(PresetTimestamps $timestamps): void
    {
        $this->timestamps = $timestamps;
    }

    public function timestamps(): PresetTimestamps
    {
        return $this->timestamps;
    }
}
