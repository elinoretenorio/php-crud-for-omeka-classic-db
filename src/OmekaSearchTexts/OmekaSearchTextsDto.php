<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSearchTexts;

class OmekaSearchTextsDto 
{
    public int $id;
    public string $recordType;
    public int $recordId;
    public int $public;
    public string $title;
    public string $text;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->recordType = $row["record_type"] ?? "";
        $this->recordId = (int) ($row["record_id"] ?? 0);
        $this->public = (int) ($row["public"] ?? 0);
        $this->title = $row["title"] ?? "";
        $this->text = $row["text"] ?? "";
    }
}