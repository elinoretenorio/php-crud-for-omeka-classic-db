<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaPlugins;

use JsonSerializable;

class OmekaPluginsModel implements JsonSerializable
{
    private int $id;
    private string $name;
    private int $active;
    private string $version;

    public function __construct(OmekaPluginsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->name = $dto->name;
        $this->active = $dto->active;
        $this->version = $dto->version;
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

    public function getActive(): int
    {
        return $this->active;
    }

    public function setActive(int $active): void
    {
        $this->active = $active;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function toDto(): OmekaPluginsDto
    {
        $dto = new OmekaPluginsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->name = $this->name ?? "";
        $dto->active = (int) ($this->active ?? 0);
        $dto->version = $this->version ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "active" => $this->active,
            "version" => $this->version,
        ];
    }
}