<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypesElements;

use JsonSerializable;

class OmekaItemTypesElementsModel implements JsonSerializable
{
    private int $id;
    private int $itemTypeId;
    private int $elementId;
    private int $order;

    public function __construct(OmekaItemTypesElementsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->itemTypeId = $dto->itemTypeId;
        $this->elementId = $dto->elementId;
        $this->order = $dto->order;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getItemTypeId(): int
    {
        return $this->itemTypeId;
    }

    public function setItemTypeId(int $itemTypeId): void
    {
        $this->itemTypeId = $itemTypeId;
    }

    public function getElementId(): int
    {
        return $this->elementId;
    }

    public function setElementId(int $elementId): void
    {
        $this->elementId = $elementId;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    public function toDto(): OmekaItemTypesElementsDto
    {
        $dto = new OmekaItemTypesElementsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->itemTypeId = (int) ($this->itemTypeId ?? 0);
        $dto->elementId = (int) ($this->elementId ?? 0);
        $dto->order = (int) ($this->order ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "item_type_id" => $this->itemTypeId,
            "element_id" => $this->elementId,
            "order" => $this->order,
        ];
    }
}