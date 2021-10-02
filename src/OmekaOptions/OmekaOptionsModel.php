<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaOptions;

use JsonSerializable;

class OmekaOptionsModel implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $value;

    public function __construct(OmekaOptionsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->name = $dto->name;
        $this->value = $dto->value;
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

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function toDto(): OmekaOptionsDto
    {
        $dto = new OmekaOptionsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->name = $this->name ?? "";
        $dto->value = $this->value ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "value" => $this->value,
        ];
    }
}