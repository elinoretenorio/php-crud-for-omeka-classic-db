<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypesElements;

class OmekaItemTypesElementsDto 
{
    public int $id;
    public int $itemTypeId;
    public int $elementId;
    public int $order;

    public function __construct(array $row = null)
    {
        if ($row === null) {
            return;
        }

        $this->id = (int) ($row["id"] ?? 0);
        $this->itemTypeId = (int) ($row["item_type_id"] ?? 0);
        $this->elementId = (int) ($row["element_id"] ?? 0);
        $this->order = (int) ($row["order"] ?? 0);
    }
}