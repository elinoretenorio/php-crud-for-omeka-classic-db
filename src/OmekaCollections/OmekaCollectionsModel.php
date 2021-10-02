<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaCollections;

use JsonSerializable;

class OmekaCollectionsModel implements JsonSerializable
{
    private int $id;
    private int $public;
    private int $featured;
    private string $added;
    private string $modified;
    private int $ownerId;

    public function __construct(OmekaCollectionsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->public = $dto->public;
        $this->featured = $dto->featured;
        $this->added = $dto->added;
        $this->modified = $dto->modified;
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

    public function getPublic(): int
    {
        return $this->public;
    }

    public function setPublic(int $public): void
    {
        $this->public = $public;
    }

    public function getFeatured(): int
    {
        return $this->featured;
    }

    public function setFeatured(int $featured): void
    {
        $this->featured = $featured;
    }

    public function getAdded(): string
    {
        return $this->added;
    }

    public function setAdded(string $added): void
    {
        $this->added = $added;
    }

    public function getModified(): string
    {
        return $this->modified;
    }

    public function setModified(string $modified): void
    {
        $this->modified = $modified;
    }

    public function getOwnerId(): int
    {
        return $this->ownerId;
    }

    public function setOwnerId(int $ownerId): void
    {
        $this->ownerId = $ownerId;
    }

    public function toDto(): OmekaCollectionsDto
    {
        $dto = new OmekaCollectionsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->public = (int) ($this->public ?? 0);
        $dto->featured = (int) ($this->featured ?? 0);
        $dto->added = $this->added ?? "";
        $dto->modified = $this->modified ?? "";
        $dto->ownerId = (int) ($this->ownerId ?? 0);

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "public" => $this->public,
            "featured" => $this->featured,
            "added" => $this->added,
            "modified" => $this->modified,
            "owner_id" => $this->ownerId,
        ];
    }
}