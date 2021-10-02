<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItems;

use JsonSerializable;

class OmekaItemsModel implements JsonSerializable
{
    private int $id;
    private int $itemTypeId;
    private int $collectionId;
    private int $featured;
    private int $public;
    private string $modified;
    private string $added;
    private int $ownerId;

    public function __construct(OmekaItemsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->itemTypeId = $dto->itemTypeId;
        $this->collectionId = $dto->collectionId;
        $this->featured = $dto->featured;
        $this->public = $dto->public;
        $this->modified = $dto->modified;
        $this->added = $dto->added;
        $this->ownerId = $dto->ownerId;
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

    public function getCollectionId(): int
    {
        return $this->collectionId;
    }

    public function setCollectionId(int $collectionId): void
    {
        $this->collectionId = $collectionId;
    }

    public function getFeatured(): int
    {
        return $this->featured;
    }

    public function setFeatured(int $featured): void
    {
        $this->featured = $featured;
    }

    public function getPublic(): int
    {
        return $this->public;
    }

    public function setPublic(int $public): void
    {
        $this->public = $public;
    }

    public function getModified(): string
    {
        return $this->modified;
    }

    public function setModified(string $modified): void
    {
        $this->modified = $modified;
    }

    public function getAdded(): string
    {
        return $this->added;
    }

    public function setAdded(string $added): void
    {
        $this->added = $added;
    }

    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    public function setOwnerId(int $ownerId): void
    {
        $this->ownerId = $ownerId;
    }

    public function toDto(): OmekaItemsDto
    {
        $dto = new OmekaItemsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->itemTypeId = (int) ($this->itemTypeId ?? 0);
        $dto->collectionId = (int) ($this->collectionId ?? 0);
        $dto->featured = (int) ($this->featured ?? 0);
        $dto->public = (int) ($this->public ?? 0);
        $dto->modified = $this->modified ?? "";
        $dto->added = $this->added ?? "";
        $dto->ownerId = (int) ($this->ownerId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "item_type_id" => $this->itemTypeId,
            "collection_id" => $this->collectionId,
            "featured" => $this->featured,
            "public" => $this->public,
            "modified" => $this->modified,
            "added" => $this->added,
            "owner_id" => $this->ownerId,
        ];
    }
}