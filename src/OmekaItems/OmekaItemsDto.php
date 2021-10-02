<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItems;

class OmekaItemsDto 
{
    public int $id;
    public int $itemTypeId;
    public int $collectionId;
    public int $featured;
    public int $public;
    public string $modified;
    public string $added;
    public int $ownerId;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->itemTypeId = (int) ($row["item_type_id"] ?? 0);
        $this->collectionId = (int) ($row["collection_id"] ?? 0);
        $this->featured = (int) ($row["featured"] ?? 0);
        $this->public = (int) ($row["public"] ?? 0);
        $this->modified = $row["modified"] ?? "";
        $this->added = $row["added"] ?? "";
        $this->ownerId = (int) ($row["owner_id"] ?? 0);
    }
}