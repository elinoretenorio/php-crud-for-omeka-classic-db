<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaItemTypes;

use JsonSerializable;

class OmekaItemTypesModel implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $description;

    public function __construct(OmekaItemTypesDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
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

    public function toDto(): OmekaItemTypesDto
    {
        $dto = new OmekaItemTypesDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->name = $this->name ?? "";
        $dto->description = $this->description ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
        ];
    }
}