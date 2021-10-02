<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaCollections;

class OmekaCollectionsDto 
{
    public int $id;
    public int $public;
    public int $featured;
    public string $added;
    public string $modified;
    public int $ownerId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->public = (int) ($row["public"] ?? 0);
        $this->featured = (int) ($row["featured"] ?? 0);
        $this->added = $row["added"] ?? "";
        $this->modified = $row["modified"] ?? "";
        $this->ownerId = (int) ($row["owner_id"] ?? 0);
    }
}