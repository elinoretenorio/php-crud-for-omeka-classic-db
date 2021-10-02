<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaRecordsTags;

class OmekaRecordsTagsDto 
{
    public int $id;
    public int $recordId;
    public string $recordType;
    public int $tagId;
    public string $time;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->recordId = (int) ($row["record_id"] ?? 0);
        $this->recordType = $row["record_type"] ?? "";
        $this->tagId = (int) ($row["tag_id"] ?? 0);
        $this->time = $row["time"] ?? "";
    }
}