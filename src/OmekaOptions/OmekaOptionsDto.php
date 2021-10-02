<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaOptions;

class OmekaOptionsDto 
{
    public int $id;
    public string $name;
    public string $value;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->name = $row["name"] ?? "";
        $this->value = $row["value"] ?? "";
    }
}