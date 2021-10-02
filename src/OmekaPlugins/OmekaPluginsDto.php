<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaPlugins;

class OmekaPluginsDto 
{
    public int $id;
    public string $name;
    public int $active;
    public string $version;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->name = $row["name"] ?? "";
        $this->active = (int) ($row["active"] ?? 0);
        $this->version = $row["version"] ?? "";
    }
}