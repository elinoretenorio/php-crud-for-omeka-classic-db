<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementTexts;

class OmekaElementTextsDto 
{
    public int $id;
    public int $recordId;
    public string $recordType;
    public int $elementId;
    public int $html;
    public string $text;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->recordId = (int) ($row["record_id"] ?? 0);
        $this->recordType = $row["record_type"] ?? "";
        $this->elementId = (int) ($row["element_id"] ?? 0);
        $this->html = (int) ($row["html"] ?? 0);
        $this->text = $row["text"] ?? "";
    }
}