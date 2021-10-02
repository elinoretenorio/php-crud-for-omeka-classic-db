<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaSessions;

use JsonSerializable;

class OmekaSessionsModel implements JsonSerializable
{
    private int $sessionId;
    private string $id;
    private int $modified;
    private int $lifetime;
    private string $data;

    public function __construct(OmekaSessionsDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->sessionId = $dto->sessionId;
        $this->id = $dto->id;
        $this->modified = $dto->modified;
        $this->lifetime = $dto->lifetime;
        $this->data = $dto->data;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function setSessionId(int $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getModified(): int
    {
        return $this->modified;
    }

    public function setModified(int $modified): void
    {
        $this->modified = $modified;
    }

    public function getLifetime(): int
    {
        return $this->lifetime;
    }

    public function setLifetime(int $lifetime): void
    {
        $this->lifetime = $lifetime;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): void
    {
        $this->data = $data;
    }

    public function toDto(): OmekaSessionsDto
    {
        $dto = new OmekaSessionsDto();
        $dto->sessionId = (int) ($this->sessionId ?? 0);
        $dto->id = $this->id ?? "";
        $dto->modified = (int) ($this->modified ?? 0);
        $dto->lifetime = (int) ($this->lifetime ?? 0);
        $dto->data = $this->data ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "session_id" => $this->sessionId,
            "id" => $this->id,
            "modified" => $this->modified,
            "lifetime" => $this->lifetime,
            "data" => $this->data,
        ];
    }
}