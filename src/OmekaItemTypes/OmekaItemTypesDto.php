<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypes;

class OmekaItemTypesDto 
{
    public int $id;
    public string $name;
    public string $description;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->name = $row["name"] ?? "";
        $this->description = $row["description"] ?? "";
    }
}