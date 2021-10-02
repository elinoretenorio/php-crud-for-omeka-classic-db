<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSchemaMigrations;

use JsonSerializable;

class OmekaSchemaMigrationsModel implements JsonSerializable
{
    private int $id;
    private string $version;

    public function __construct(OmekaSchemaMigrationsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
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

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function toDto(): OmekaSchemaMigrationsDto
    {
        $dto = new OmekaSchemaMigrationsDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->version = $this->version ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "version" => $this->version,
        ];
    }
}