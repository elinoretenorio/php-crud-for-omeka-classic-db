<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaElementSets;

use JsonSerializable;

class OmekaElementSetsModel implements JsonSerializable
{
    private int $id;
    private string $recordType;
    private string $name;
    private string $description;

    public function __construct(OmekaElementSetsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->recordType = $dto->recordType;
        $this->name = $dto->name;
        $this->description = $dto->description;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getRecordType(): string
    {
        return $this->recordType;
    }

    public function setRecordType(string $recordType): void
    {
        $this->recordType = $recordType;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function toDto(): OmekaElementSetsDto
    {
        $dto = new OmekaElementSetsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->recordType = $this->recordType ?? "";
        $dto->name = $this->name ?? "";
        $dto->description = $this->description ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "record_type" => $this->recordType,
            "name" => $this->name,
            "description" => $this->description,
        ];
    }
}