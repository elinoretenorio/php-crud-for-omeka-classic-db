<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElements;

class OmekaElementsDto 
{
    public int $id;
    public int $elementSetId;
    public int $order;
    public string $name;
    public string $description;
    public string $comment;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->elementSetId = (int) ($row["element_set_id"] ?? 0);
        $this->order = (int) ($row["order"] ?? 0);
        $this->name = $row["name"] ?? "";
        $this->description = $row["description"] ?? "";
        $this->comment = $row["comment"] ?? "";
    }
}