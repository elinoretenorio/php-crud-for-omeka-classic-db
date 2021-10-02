<?php

declare(strict_types=1);

namespace OmekaClassic\OmekaKeys;

use JsonSerializable;

class OmekaKeysModel implements JsonSerializable
{
    private int $id;
    private int $userId;
    private string $label;
    private string $key;
    private string $ip;
    private string $accessed;

    public function __construct(OmekaKeysDto $dto = null)
    {
        if ($dto === null) {
            return;
        }

        $this->id = $dto->id;
        $this->userId = $dto->userId;
        $this->label = $dto->label;
        $this->key = $dto->key;
        $this->ip = $dto->ip;
        $this->accessed = $dto->accessed;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function getIp(): string
    {
        return $this->ip;
    }

    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }

    public function getAccessed(): string
    {
        return $this->accessed;
    }

    public function setAccessed(string $accessed): void
    {
        $this->accessed = $accessed;
    }

    public function toDto(): OmekaKeysDto
    {
        $dto = new OmekaKeysDto();
        $dto->id = (int) ($this->id ?? 0);
        $dto->userId = (int) ($this->userId ?? 0);
        $dto->label = $this->label ?? "";
        $dto->key = $this->key ?? "";
        $dto->ip = $this->ip ?? "";
        $dto->accessed = $this->accessed ?? "";

        return $dto;
    }

    public function jsonSerialize(): array
    {
        return [
            "id" => $this->id,
            "user_id" => $this->userId,
            "label" => $this->label,
            "key" => $this->key,
            "ip" => $this->ip,
            "accessed" => $this->accessed,
        ];
    }
}