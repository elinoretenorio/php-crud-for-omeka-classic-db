<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaFiles;

use JsonSerializable;

class OmekaFilesModel implements JsonSerializable
{
    private int $id;
    private int $itemId;
    private int $order;
    private int $size;
    private int $hasDerivativeImage;
    private string $authentication;
    private string $mimeType;
    private string $typeOs;
    private string $filename;
    private string $originalFilename;
    private string $modified;
    private string $added;
    private int $stored;
    private string $metadata;

    public function __construct(OmekaFilesDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->itemId = $dto->itemId;
        $this->order = $dto->order;
        $this->size = $dto->size;
        $this->hasDerivativeImage = $dto->hasDerivativeImage;
        $this->authentication = $dto->authentication;
        $this->mimeType = $dto->mimeType;
        $this->typeOs = $dto->typeOs;
        $this->filename = $dto->filename;
        $this->originalFilename = $dto->originalFilename;
        $this->modified = $dto->modified;
        $this->added = $dto->added;
        $this->stored = $dto->stored;
        $this->metadata = $dto->metadata;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getItemId(): int
    {
        return $this->itemId;
    }

    public function setItemId(int $itemId): void
    {
        $this->itemId = $itemId;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function setSize(int $size): void
    {
        $this->size = $size;
    }

    public function getHasDerivativeImage(): int
    {
        return $this->hasDerivativeImage;
    }

    public function setHasDerivativeImage(int $hasDerivativeImage): void
    {
        $this->hasDerivativeImage = $hasDerivativeImage;
    }

    public function getAuthentication(): string
    {
        return $this->authentication;
    }

    public function setAuthentication(string $authentication): void
    {
        $this->authentication = $authentication;
    }

    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    public function setMimeType(string $mimeType): void
    {
        $this->mimeType = $mimeType;
    }

    public function getTypeOs(): string
    {
        return $this->typeOs;
    }

    public function setTypeOs(string $typeOs): void
    {
        $this->typeOs = $typeOs;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }

    public function getOriginalFilename(): string
    {
        return $this->originalFilename;
    }

    public function setOriginalFilename(string $originalFilename): void
    {
        $this->originalFilename = $originalFilename;
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

    public function getStored(): int
    {
        return $this->stored;
    }

    public function setStored(int $stored): void
    {
        $this->stored = $stored;
    }

    public function getMetadata(): string
    {
        return $this->metadata;
    }

    public function setMetadata(string $metadata): void
    {
        $this->metadata = $metadata;
    }

    public function toDto(): OmekaFilesDto
    {
        $dto = new OmekaFilesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->itemId = (int) ($this->itemId ?? 0);
        $dto->order = (int) ($this->order ?? 0);
        $dto->size = (int) ($this->size ?? 0);
        $dto->hasDerivativeImage = (int) ($this->hasDerivativeImage ?? 0);
        $dto->authentication = $this->authentication ?? "";
        $dto->mimeType = $this->mimeType ?? "";
        $dto->typeOs = $this->typeOs ?? "";
        $dto->filename = $this->filename ?? "";
        $dto->originalFilename = $this->originalFilename ?? "";
        $dto->modified = $this->modified ?? "";
        $dto->added = $this->added ?? "";
        $dto->stored = (int) ($this->stored ?? 0);
        $dto->metadata = $this->metadata ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "item_id" => $this->itemId,
            "order" => $this->order,
            "size" => $this->size,
            "has_derivative_image" => $this->hasDerivativeImage,
            "authentication" => $this->authentication,
            "mime_type" => $this->mimeType,
            "type_os" => $this->typeOs,
            "filename" => $this->filename,
            "original_filename" => $this->originalFilename,
            "modified" => $this->modified,
            "added" => $this->added,
            "stored" => $this->stored,
            "metadata" => $this->metadata,
        ];
    }
}