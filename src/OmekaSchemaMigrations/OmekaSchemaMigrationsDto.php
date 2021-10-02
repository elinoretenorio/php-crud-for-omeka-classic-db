<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSchemaMigrations;

class OmekaSchemaMigrationsDto 
{
    public int $id;
    public string $version;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->version = $row["version"] ?? "";
    }
}