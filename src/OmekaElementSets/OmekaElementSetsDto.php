<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementSets;

class OmekaElementSetsDto 
{
    public int $id;
    public string $recordType;
    public string $name;
    public string $description;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->recordType = $row["record_type"] ?? "";
        $this->name = $row["name"] ?? "";
        $this->description = $row["description"] ?? "";
    }
}